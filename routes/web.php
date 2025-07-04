<?php

use App\Http\Controllers\FluxoCaixaController;
use App\Models\FluxoCaixa;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\QRCodeController;
use App\Http\Controllers\AcessoController;
use App\Http\Controllers\TesteImageController;
use App\Http\Controllers\FilialController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\FormaPagamentoController;
use App\Http\Controllers\GuardaVolumeController;
use App\Http\Controllers\CaixaController;

// ROTA DE LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('login_validar', [LoginController::class, 'login_validar'])->name('login_validar');
// ROTA INICIAL -> REDIRECIONAR PARA LOGIN
Route::redirect('/', '/login');

// LOGOUT
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// ROTAS PROTEGIDAS POR LOGIN
Route::middleware(['auth'])->group(function () {

    // Página inicial pós login
    Route::get('/pdv', [QRCodeController::class, 'pdv'])->name('qrcode.index');
    Route::post('/qrcode/gerar', [QRCodeController::class, 'gerar'])->name('qrcode.gerar');
    Route::get('/dashboard', [QRCodeController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/verifica-caixa-aberto', [CaixaController::class, 'verificaCaixaAberto'])->name('caixa.verifica');
    Route::post('/abrir-caixa', [CaixaController::class, 'abrirCaixa'])->name('caixa.abrir');
    Route::post('/caixa/{id}/fechar', [CaixaController::class, 'fecharCaixa']);

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

    // Forma de pagamento
    Route::get('/formapagamento', [FormaPagamentoController::class, 'index'])->name('formapagamento.index');
    Route::get('/formapagamento/edit', [FormaPagamentoController::class, 'edit'])->name('formapagamento.edit');
    Route::get('/formapagamento/create', [FormaPagamentoController::class, 'create'])->name('formapagamento.create');
    Route::get('/formapagamento/destroy', [FormaPagamentoController::class, 'destroy'])->name('formapagamento.destroy');
    

    // Cadastros
    Route::resource('filiais', FilialController::class);
    Route::resource('produtos', ProdutoController::class);

    // FLUXO DE CAIXA - excluindo método show para evitar erro
    Route::resource('fluxocaixa', FluxoCaixaController::class)->except(['show']);

    Route::get('fluxocaixa/relatorio', [FluxoCaixaController::class, 'relatorio'])->name('fluxocaixa.relatorio');
    Route::post('fluxocaixa/relatorio', [FluxoCaixaController::class, 'relatorioResultado'])->name('fluxocaixa.relatorio.resultado');
    Route::post('fluxocaixa/relatorio/pdf', [FluxoCaixaController::class, 'gerarPdf'])->name('fluxocaixa.relatorio.pdf');
    Route::post('fluxocaixa/relatorio/excel', [FluxoCaixaController::class, 'gerarExcel'])->name('fluxocaixa.relatorio.excel');
}); // fechamento do grupo de rotas
