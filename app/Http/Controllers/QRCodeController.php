<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\QRCode;
use App\Models\Produto;
use App\Models\Cliente;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeGenerator;

class QRCodeController extends Controller
{
   public function pdv()
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


public function dashboard()
{
    // Agrupar QR Codes por produto
    $qrcodesPorProduto = QRCode::with('produto')
        ->get()
        ->groupBy('produto.descricao')
        ->map->count();

        $qrcodes = QRCode::with(['user', 'produto'])->latest()->get();
    $produtos = Produto::latest()->get();
    $totalQRCodes = $qrcodes->count();
    $qrcodesUsados = $qrcodes->whereNotNull('used_at')->count();
    $qrcodesDisponiveis = $qrcodes->whereNull('used_at')->count();

    // Produtos mais usados (ex: pelos QR Codes com used_at preenchido)
    $produtosMaisUsados = QRCode::with('produto')
        ->whereNotNull('used_at')
        ->get()
        ->groupBy('produto.descricao')
        ->map->count();

    return view('admin.dashboard', [
        'qrcodesPorProduto' => $qrcodesPorProduto,
        'produtosMaisUsados' => $produtosMaisUsados,
        'produtos'=>$produtos,
        'totalQRCodes'=>$totalQRCodes,
        'qrcodesUsados'=>$qrcodesUsados,
        'qrcodesDisponiveis'=>$qrcodesDisponiveis,

    ]);
}


public function gerar(Request $request)
{
    // Validação dos campos
    $data = $request->validate([
        'produto_id' => 'required|exists:produtos,idproduto',
        'nome'       => 'required|string|max:255',
        'cpf'        => 'nullable|string|max:20',
        'email'      => 'nullable|email|max:255',
        'telefone'   => 'nullable|string|max:20',
        'descricao'  => 'required|string|max:255', // será salva no cliente
    ]);

    // Criar cliente com descrição do pertence
    $cliente = Cliente::create([
        'nome'      => $data['nome'],
        'cpf'       => $data['cpf'],
        'email'     => $data['email'],
        'telefone'  => $data['telefone'],
    ]);

    // Criar o QRCode atrelado ao cliente
    QRCode::create([
        'code'        => \Str::uuid()->toString(),
        'user_id'     => auth()->id(),
        'produto_id'  => $data['produto_id'],
        'cliente_id'  => $cliente->id,
        'entrada_em'  => now(),
        'descricao' => $data['descricao'], // PERTENCE

    ]);

    return redirect()->route('qrcode.index')->with('mensagem', 'QR Code e Cliente criados com sucesso!');
}







}
