<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\QRCode;
use App\Models\Produto;
use App\Models\Cliente;
use App\Models\FormaPagamento;

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
   $formasPagamentos = FormaPagamento::all();

    return view('qrcode.index', compact(
        'qrcodes',
        'produtos',
        'totalQRCodes',
        'qrcodesUsados',
        'qrcodesDisponiveis',
        'formasPagamentos'
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
    // Valida só o produto_id inicialmente
    $data = $request->validate([
        'produto_id' => 'required|exists:produtos,idproduto',
    ]);

    // Busca o produto para verificar a descrição
    $produto = Produto::where('idproduto', $data['produto_id'])->first();

    // Se for Guarda Volume, valida os campos do cliente também
    if ($produto && strtolower($produto->descricao) === 'guarda volume') {
        $dataCliente = $request->validate([
            'nome'       => 'required|string|max:255',
            'cpf'        => 'nullable|string|max:20',
            'email'      => 'nullable|email|max:255',
            'telefone'   => 'nullable|string|max:20',
            'descricao'  => 'required|string|max:255',
        ]);

        // Cria cliente
        $cliente = Cliente::create([
            'nome'      => $dataCliente['nome'],
            'cpf'       => $dataCliente['cpf'] ?? null,
            'email'     => $dataCliente['email'] ?? null,
            'telefone'  => $dataCliente['telefone'] ?? null,
        ]);

        // Cria QRCode com cliente atrelado
        QRCode::create([
            'code'        => \Str::uuid()->toString(),
            'user_id'     => auth()->id(),
            'produto_id'  => $data['produto_id'],
            'cliente_id'  => $cliente->id,
            'entrada_em'  => now(),
            'descricao'   => $dataCliente['descricao'], // Descrição do pertence
        ]);
    } else {
        // Se não for guarda volume, cria só o QRCode sem cliente
        QRCode::create([
            'code'        => \Str::uuid()->toString(),
            'user_id'     => auth()->id(),
            'produto_id'  => $data['produto_id'],
            'entrada_em'  => now(),
        ]);
    }

    return redirect()->route('qrcode.index')->with('mensagem', 'QR Code criado com sucesso!');
}







}
