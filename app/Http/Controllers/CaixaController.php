<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\FormaPagamento;
use App\Models\CaixaItem;
use App\Models\Caixa;
use App\Models\FluxoCaixa;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CaixaController extends Controller
{
    // Exibir a página com botão e modal (view)
    public function index()
    {
        $produtos = Produto::all();
        $formasPagamento = FormaPagamento::all();

        return view('caixa.index', compact('produtos', 'formasPagamento'));
    }

    // Método para verificar se há caixa aberto para o usuário
    public function verificaCaixaAberto(Request $request)
    {
        $iduser = $request->input('iduser');

        $caixaAberto = Caixa::where('iduser', $iduser)
            ->whereNull('datahora_fechamento')
            ->exists();

        return response()->json(['caixa_aberto' => $caixaAberto]);
    }

    // Método para abrir o caixa (inserir registro)
    public function abrirCaixa(Request $request)
    {
        $request->validate([
            'iduser' => 'required|integer',
            'valor_inicial' => 'required|numeric|min:0',
            'idfilial' => 'required|integer',
        ]);

        $caixa = Caixa::create([
            'iduser' => $request->iduser,
            'datahora_abertura' => Carbon::now(),
            'idfilial' => $request->idfilial,
            'total_bruto' => 0,
            'total_desconto' => 0,
            'total_acrescimo' => 0,
            'total_liquido' => 0,
            'formadepagamento' => null,
        ]);

        return response()->json(['success' => true, 'id' => $caixa->id]);
    }

   // Salvar os dados e gerar QR code
public function gerarQr(Request $request)
{
    $request->validate([
        'idproduto' => 'required|exists:produtos,id',
        'valor' => 'required|numeric',
        'desconto' => 'nullable|numeric',
        'acrescimo' => 'nullable|numeric',
        'valorapagar' => 'required|numeric',
        'formadepagamento' => 'required|string',
    ]);

    // Buscar o caixa aberto do usuário atual
    $caixaAtual = Caixa::where('iduser', Auth::id())
        ->whereNull('datahora_fechamento')
        ->latest('datahora_abertura')
        ->first();

    if (!$caixaAtual) {
        return response()->json(['erro' => 'Nenhum caixa aberto encontrado.'], 400);
    }

    // Criar item de venda
    $item = new CaixaItem();
    $item->iduser = Auth::id();
    $item->datetime = now();
    $item->idproduto = $request->idproduto;
    $item->valor = $request->valor;
    $item->desconto = $request->desconto ?? 0;
    $item->acrescimo = $request->acrescimo ?? 0;
    $item->valorapagar = $request->valorapagar;
    $item->formadepagamento = $request->formadepagamento;
    $item->caixa_header_id = $caixaAtual->id; // 🔴 Aqui é a linha que associa ao caixa
    $item->save();

    // Gerar QR code
    $data = "Pagamento: R$ " . number_format($item->valorapagar, 2, ',', '.') . " via " . $item->formadepagamento;
    $qrcode = QrCode::size(250)->generate($data);

    return response()->json([
        'success' => true,
        'qrcode' => $qrcode
    ]);
}

    // Método para fechar o caixa e registrar no fluxo_caixa
 public function fecharCaixa(Request $request, $id)
{
    DB::beginTransaction();

    try {
        $caixa = Caixa::findOrFail($id);

        if ($caixa->datahora_fechamento) {
            return response()->json(['erro' => 'Caixa já está fechado.'], 400);
        }

        // Somar lançamentos em caixa_item para o caixa aberto
        $itens = CaixaItem::where('caixa_header_id', $caixa->id)
            ->selectRaw('formadepagamento, SUM(valor) as total_bruto, SUM(desconto) as total_desconto, SUM(acrescimo) as total_acrescimo, SUM(valorapagar) as total_liquido')
            ->groupBy('formadepagamento')
            ->get();

        $totalBruto = 0;
        $totalDesconto = 0;
        $totalAcrescimo = 0;
        $totalLiquido = 0;

        foreach ($itens as $item) {
            $totalBruto += $item->total_bruto;
            $totalDesconto += $item->total_desconto;
            $totalAcrescimo += $item->total_acrescimo;
            $totalLiquido += $item->total_liquido;

            // Lançar no fluxo de caixa
            FluxoCaixa::create([
                'iduser' => $caixa->iduser,
                'descricao' => "Fechamento de caixa #{$caixa->id} ({$item->formadepagamento})",
                'valor' => $item->total_liquido,
                'tipo' => 'ENTRADA',
                'categoria' => 'Fechamento de Caixa',
                'data_movimento' => now(),
                'formadepagamento' => $item->formadepagamento,
                'id_caixa' => $caixa->id,
            ]);
        }

        // Atualizar fechamento do caixa
        $caixa->update([
            'total_bruto' => $totalBruto,
            'total_desconto' => $totalDesconto,
            'total_acrescimo' => $totalAcrescimo,
            'total_liquido' => $totalLiquido,
            'datahora_fechamento' => now(),
            'datafechamento' => now()->toDateString(),
        ]);

        DB::commit();

        return response()->json(['success' => 'Caixa fechado com sucesso.']);

    } catch (\Exception $e) {
        DB::rollBack();
        return response()->json(['erro' => 'Erro ao fechar caixa: ' . $e->getMessage()], 500);
    }
}

    // Verificar se há caixa aberto de dia anterior
    public function verificaCaixaAntigo(Request $request)
    {
        $iduser = $request->input('iduser');

        $caixaAberto = Caixa::where('iduser', $iduser)
            ->whereNull('datahora_fechamento')
            ->orderBy('datahora_abertura', 'desc')
            ->first();

        if ($caixaAberto) {
            $dataAbertura = Carbon::parse($caixaAberto->datahora_abertura)->toDateString();
            $hoje = Carbon::today()->toDateString();

            if ($dataAbertura !== $hoje) {
                return response()->json([
                    'status' => 'erro',
                    'mensagem' => 'Existe um caixa aberto de um dia anterior. Feche-o antes de continuar.',
                    'id_caixa' => $caixaAberto->id
                ]);
            }
        }

        return response()->json(['status' => 'ok']);
    }
}
