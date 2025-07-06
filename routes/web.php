<?php

use App\Http\Controllers\FluxoCaixaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\TesteImageController;
use App\Http\Controllers\FilialController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FormaPagamentoController;
use App\Http\Controllers\GuardaVolumeController;
use App\Http\Controllers\CaixaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\RelatorioVendasController;

// ROTA DE LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('login_validar', [LoginController::class, 'login_validar'])->name('login_validar');

// REDIRECIONAR RAIZ PARA LOGIN
Route::redirect('/', '/login');

// LOGOUT
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// ROTAS PROTEGIDAS POR LOGIN
Route::middleware(['auth'])->group(function () {

    // PÁGINA INICIAL PÓS LOGIN
    Route::get('/pdv', [QRCodeController::class, 'pdv'])->name('qrcode.index');
    Route::post('/qrcode/gerar', [QRCodeController::class, 'gerar'])->name('qrcode.gerar');
    Route::get('/dashboard', [QRCodeController::class, 'dashboard'])->name('admin.dashboard');

    // Rotas Caixa
    Route::post('/verifica-caixa-aberto', [CaixaController::class, 'verificaCaixaAberto'])->name('caixa.verifica');
    Route::post('/verifica-caixa-antigo', [CaixaController::class, 'verificaCaixaAntigo'])->name('caixa.verifica.antigo');
    Route::post('/abrir-caixa', [CaixaController::class, 'abrirCaixa'])->name('caixa.abrir');
    Route::post('/caixa/fechar/{id}', [CaixaController::class, 'fecharCaixa'])->name('caixa.fechar');

    // Guarda Volume
    Route::post('/finalizarRetirada', [GuardaVolumeController::class, 'finalizarRetirada'])->name('guarda.finalizar');
    Route::post('/busca', [GuardaVolumeController::class, 'buscar'])->name('guarda_volume.buscar');

    // Validação de acesso por QR Code
    Route::post('/acesso/validar', [AcessoController::class, 'validarQRCode'])->name('acesso.validar');
    Route::get('/acesso/status/{status}', [AcessoController::class, 'status'])->name('acesso.status');

    // API local da catraca
    Route::get('/api/catraca/verificar/{uuid}', [AcessoController::class, 'verificar']);

    // Teste de GD
    Route::get('/teste-gd', [TesteImageController::class, 'testeGD']);

    // Chamando API da catraca externa
    Route::get('/liberar-catraca', function () {
        $response = Http::get('http://localhost:5000/liberar');
        return $response->json();
    });

    // Forma de pagamento - CRUD completo via resource
    Route::resource('formapagamento', FormaPagamentoController::class);

    // Cadastros de filiais e produtos
    Route::resource('filiais', FilialController::class);
    Route::resource('produtos', ProdutoController::class);

    // Fluxo de Caixa - todas as rotas via resource (exceto show que você não usa)
    Route::resource('fluxocaixa', FluxoCaixaController::class)->except(['show']);

    // Rotas adicionais para o relatório do fluxo de caixa
    Route::get('fluxocaixa/relatorio', [FluxoCaixaController::class, 'relatorio'])->name('fluxocaixa.relatorio');
    Route::post('fluxocaixa/relatorio', [FluxoCaixaController::class, 'relatorioResultado'])->name('fluxocaixa.relatorio.resultado');
    Route::post('fluxocaixa/relatorio/pdf', [FluxoCaixaController::class, 'gerarPdf'])->name('fluxocaixa.relatorio.pdf');
    Route::post('fluxocaixa/relatorio/excel', [FluxoCaixaController::class, 'gerarExcel'])->name('fluxocaixa.relatorio.excel');
    // relatorio de vendas
    Route::middleware(['auth'])->group(function () {
    // ...
    Route::get('/relatorio-vendas', [RelatorioVendasController::class, 'index'])->name('relatorio.vendas');
    Route::get('/relatorio-vendas/pdf', [RelatorioVendasController::class, 'pdf'])->name('relatorio.vendas.pdf');
    Route::get('/relatorio-vendas/excel', [RelatorioVendasController::class, 'excel'])->name('relatorio.vendas.excel');
});

});
