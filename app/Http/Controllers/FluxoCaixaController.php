<?php

namespace App\Http\Controllers;

use App\Models\FluxoCaixa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class FluxoCaixaController extends Controller
{
    public function index()
    {
        return redirect()->route('fluxocaixa.relatorio');
    }

    /**
     * Exibe o formulário para gerar o relatório.
     */
    public function relatorio()
    {
        return view('fluxocaixa.relatorio');
    }

    /**
     * Gera o resultado do relatório com base nas datas fornecidas.
     */
    public function relatorioResultado(Request $request)
    {
        $request->validate([
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date', 'after_or_equal:data_inicio'],
        ]);

        $fluxos = FluxoCaixa::whereBetween('data_movimento', [
                $request->data_inicio,
                $request->data_fim,
            ])
            ->orderBy('data_movimento')
            ->get();

        $totalEntrada = $fluxos->where('tipo', 'ENTRADA')->sum('valor');
        $totalSaida   = $fluxos->where('tipo', 'SAIDA')->sum('valor');
        $saldoFinal   = $totalEntrada - $totalSaida;

        return view('fluxocaixa.relatorio_resultado', compact(
            'fluxos', 'totalEntrada', 'totalSaida', 'saldoFinal'
        ));
    }

    /**
     * Gera um PDF com os dados do relatório.
     */
public function gerarPdf(Request $request)
{
    $request->validate([
        'data_inicio' => ['required', 'date'],
        'data_fim' => ['required', 'date', 'after_or_equal:data_inicio'],
    ]);

    $dataInicio = $request->data_inicio;
    $dataFim = $request->data_fim;
    $idfilial = $request->idfilial;

    $query = FluxoCaixa::whereBetween('data_movimento', [$dataInicio, $dataFim]);

    if ($idfilial) {
        $query->where('filial_id', $idfilial);
        $filial = \App\Models\Filial::find($idfilial);
    } else {
        $filial = null;
    }

    $fluxos = $query->orderBy('data_movimento')->get();

    $totalEntrada = $fluxos->where('tipo', 'ENTRADA')->sum('valor');
    $totalSaida   = $fluxos->where('tipo', 'SAIDA')->sum('valor');
    $saldoFinal   = $totalEntrada - $totalSaida;

    $pdf = PDF::loadView('fluxocaixa.relatorio_pdf', [
        'lancamentos' => $fluxos,
        'totalEntrada' => $totalEntrada,
        'totalSaida' => $totalSaida,
        'saldoFinal' => $saldoFinal,
        'dataInicio' => $dataInicio,
        'dataFim' => $dataFim,
        'filial' => $filial,
    ]);

    return $pdf->download('relatorio_fluxo_caixa.pdf');
}



}
