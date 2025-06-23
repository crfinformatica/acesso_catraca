<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\QRCode;
use App\Models\Produto;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

class QRCodeController extends Controller
{
   public function index()
{
    $qrcodes = QRCode::with(['user', 'produto'])->latest()->get();
    $produtos = Produto::latest()->get();
    $totalQRCodes = $qrcodes->count();
    $qrcodesUsados = $qrcodes->whereNotNull('used_at')->count();
    $qrcodesDisponiveis = $qrcodes->whereNull('used_at')->count();

    return view('qrcode.index', compact(
        'qrcodes',
        'produtos',
        'totalQRCodes',
        'qrcodesUsados',
        'qrcodesDisponiveis'
    ));
}


public function gerar(Request $request)
{
    $request->validate([
        'produto_id' => 'required|exists:produtos,idproduto',
        'desconto' => 'nullable|numeric',
        'acrescimo' => 'nullable|numeric',
        'formadepagamento' => 'required|string',
    ]);

    $codigo = Str::uuid()->toString();
    $produtoId = $request->input('produto_id');
    $userId = auth()->id();
    $desconto = $request->input('desconto', 0);
    $acrescimo = $request->input('acrescimo', 0);
    $formaPagamento = $request->input('formadepagamento');

    // 🔎 Busca o produto
    $produto = Produto::where('idproduto', $produtoId)->first();

    if (!$produto) {
        return back()->withErrors(['produto_id' => 'Produto não encontrado.']);
    }

    $valor = $produto->valor;
    $valorFinal = $valor - $desconto + $acrescimo;

    // Salvar QRCode
  $qrcode = QRCode::create([
    'code' => $codigo,
    'user_id' => $userId,
    'produto_id' => $produtoId,
]);


    // Salvar no caixa_item
   DB::table('caixa_item')->insert([
    'qrcode_id' => $qrcode->id, // agora essa coluna existe
    'iduser' => $userId,
    'idproduto' => $produtoId,
    'valor' => $valor,
    'desconto' => $desconto,
    'acrescimo' => $acrescimo,
    'valorapagar' => $valorFinal,
    'formadepagamento' => $formaPagamento,
    'datetime' => now(),
    'created_at' => now(),
    'updated_at' => now(),
]);

    return redirect()->route('qrcode.index')->with('mensagem', 'QR Code e item do caixa registrados com sucesso.');
}





}
