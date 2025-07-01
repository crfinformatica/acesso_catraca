<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; // Assumindo que existe
use App\Models\FormaPagamento;
use App\Models\CaixaItem;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Pacote QRCode, veja nota abaixo
use App\Models\Caixa;
use Illuminate\Support\Facades\Auth;

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

        // Verifica se existe caixa aberto (datahora_fechamento é null)
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

        $item = new CaixaItem();
        $item->iduser = Auth::id();
        $item->datetime = Carbon::now();
        $item->idproduto = $request->idproduto;
        $item->valor = $request->valor;
        $item->desconto = $request->desconto ?? 0;
        $item->acrescimo = $request->acrescimo ?? 0;
        $item->valorapagar = $request->valorapagar;
        $item->formadepagamento = $request->formadepagamento;
        $item->save();

        // Gerar QR code com dados (texto simples)
        $data = "Pagamento: R$ " . number_format($item->valorapagar, 2, ',', '.') . " via " . $item->formadepagamento;
        $qrcode = QrCode::size(250)->generate($data);

        return response()->json([
            'success' => true,
            'qrcode' => $qrcode
        ]);
    }
}
