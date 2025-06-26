<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\QRCode;
use App\Models\Produto;
use App\Models\Cliente;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;


class GuardaVolumeController extends Controller
{

    public function index()
        {
            // Aqui você pode passar dados para a view se precisar
            return view('qrcode.guarda-volume');
        }


         public function verificar($uuid)
    {
        // Busca o QR Code que não foi usado ainda
        $qr = QRCode::where('code', $uuid)->whereNull('used_at')->first();

        if (!$qr) {
            return response()->json(['message' => 'QR Code inválido ou já utilizado'], 401);
        }

        // Verifica se o produto é Guarda Volume
        if ($qr->produto->descricao !== 'Guarda Volume') {
            return response()->json(['message' => 'Este QR Code não é do guarda volume'], 403);
        }

        // Supondo que você tenha um campo 'entrada_em' que marca quando o cliente guardou o pertence
        $entrada = $qr->entrada_em ?? Carbon::now(); // Ou data correta de entrada
        $saida = Carbon::now();

        // Calcula o tempo total em horas arredondado para cima
        $duracaoHoras = ceil($entrada->diffInMinutes($saida) / 60);

        $valorPorHora = 3.00;
        $valorTotal = $duracaoHoras * $valorPorHora;

        return response()->json([
            'cliente' => $qr->user->name ?? '---',
            'produto' => $qr->produto->descricao,
            'tempo_total' => $duracaoHoras,
            'valor_total' => $valorTotal,
            'qrcode_id' => $qr->id,
            'hora_entrada' => $entrada->format('d/m/Y H:i'),
            'hora_saida' => $saida->format('d/m/Y H:i'),
            
        ]);
    }

    
 public function buscar(Request $request)
{
    $codigo = $request->input('codigo_qrcode');

    $qr = QRCode::with('cliente')  // <- importante aqui
            ->where('code', $codigo)
            ->whereNull('used_at')
            ->first();

if (!$qr || $qr->produto->descricao !== 'Guarda Volume') {
    return back()->with('error', 'QR Code inválido ou já utilizado.');
}

   $qrcodes = QRCode::all();
    $totalQRCodes = $qrcodes->count();
    $qrcodesUsados = $qrcodes->whereNotNull('used_at')->count();
    $qrcodesDisponiveis = $qrcodes->whereNull('used_at')->count();
    $produtos = Produto::all();
    $qrcodes = QRCode::with(['user', 'produto'])->latest()->get();

    $entrada = $qr->entrada_em ? Carbon::parse($qr->entrada_em) : $qr->created_at;
    $saida = Carbon::now();

    $tempoEmHoras = $entrada->diffInHours($saida);
    $diasCompletosOuFracionados = ceil($tempoEmHoras / 24);

    // Valor base configurado no produto, ou R$ 3,00 como fallback
    $valorBase = $qr->produto->valor ?? 10.00;
    $valorAPagar = $valorBase * $diasCompletosOuFracionados;

return view('qrcode.index', [
    'guardaVolume' => $qr,
    'tempoGuardado' => $tempoEmHoras, // mostra o tempo total em horas, se preferir pode mudar para dias
    'valorAPagar' => $valorAPagar,
    'totalQRCodes'=> $totalQRCodes,
    'qrcodesUsados'=> $qrcodesUsados,
    'qrcodesDisponiveis' => $qrcodesDisponiveis,
    'qrcodes' => $qrcodes,
    'produtos' => $produtos
]);

}

public function finalizarRetirada(Request $request)
{
    $data = $request->validate([
        'qrcode_id'        => 'required|exists:qrcodes,id',
        'valor_base'       => 'required|numeric',
        'desconto'         => 'nullable|numeric',
        'acrescimo'        => 'nullable|numeric',
        'formadepagamento' => 'required|string',
    ]);

    $qrcode = QRCode::with('produto')->find($data['qrcode_id']);

    // Evita duplicidade
    if ($qrcode->used_at) {
        return redirect()->route('qrcode.index')->with('error', 'Este QR Code já foi finalizado.');
    }

    $userId = auth()->id();
    $valorBase = floatval($data['valor_base']);
    $desconto = floatval($data['desconto'] ?? 0);
    $acrescimo = floatval($data['acrescimo'] ?? 0);
    $valorFinal = $valorBase - $desconto + $acrescimo;

    // Insere no caixa_item
    DB::table('caixa_item')->insert([
        'qrcode_id'        => $qrcode->id,
        'iduser'           => $userId,
        'idproduto'        => $qrcode->produto_id,
        'valor'            => $valorBase,
        'desconto'         => $desconto,
        'acrescimo'        => $acrescimo,
        'valorapagar'      => $valorFinal,
        'formadepagamento' => $data['formadepagamento'],
        'datetime'         => now(),
        'created_at'       => now(),
        'updated_at'       => now(),
    ]);

    // Marca como usado
    $qrcode->used_at = now();
    $qrcode->save();

    return redirect()->route('qrcode.index')->with('mensagem', 'Pagamento registrado com sucesso.');
}


}
