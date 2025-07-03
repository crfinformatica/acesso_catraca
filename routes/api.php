<?php
use Illuminate\Support\Facades\Route;
use App\Models\Caixa;

Route::get('/caixa-aberto/{iduser}', function ($iduser) {
    $caixa = Caixa::where('iduser', $iduser)
        ->whereNull('datahora_fechamento')
        ->latest()
        ->first();

    return response()->json($caixa ? ['id' => $caixa->id] : ['id' => null]);
});
