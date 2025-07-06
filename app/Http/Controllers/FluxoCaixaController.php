<?php

namespace App\Http\Controllers;

use App\Models\FluxoCaixa;
use App\Models\Filial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FluxoCaixaExport;
use Carbon\Carbon;

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
        $filiais = Filial::all();
        return view('fluxocaixa.relatorio', compact('filiais'));
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

        $query = FluxoCaixa::whereBetween('data_movimento', [
            $request->data_inicio,
            $request->data_fim,
        ]);

        if ($request->filled('idfilial')) {
            $query->where('idfilial', $request->idfilial);
        }

        $fluxos = $query->orderBy('data_movimento')->get();

        $totalEntrada = $fluxos->where('tipo', 'ENTRADA')->sum('valor');
        $totalSaida   = $fluxos->where('tipo', 'SAIDA')->sum('valor');
        $saldoFinal   = $totalEntrada - $totalSaida;

        return view('fluxocaixa.relatorio_resultado', compact(
            'fluxos',
            'totalEntrada',
            'totalSaida',
            'saldoFinal'
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
            $query->where('idfilial', $idfilial);
            $filial = Filial::find($idfilial);
        } else {
            $filial = null;
        }

        $fluxos = $query->orderBy('data_movimento')->get();

        $totalEntrada = $fluxos->where('tipo', 'ENTRADA')->sum('valor');
        $totalSaida   = $fluxos->where('tipo', 'SAIDA')->sum('valor');
        $saldoFinal   = $totalEntrada - $totalSaida;

        $pdf = Pdf::loadView('fluxocaixa.relatorio_pdf', [
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

    /**
     * Formulário para criação de novo lançamento.
     */
    public function create()
    {
        $filiais = Filial::all();
        return view('fluxocaixa.create', compact('filiais'));
    }

    /**
     * Armazena um novo lançamento no banco.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'tipo' => 'required|in:ENTRADA,SAIDA',
            'data_movimento' => 'required|date',
            'filial_id' => 'required|exists:filial,id',
        ]);

        FluxoCaixa::create([
            'iduser' => Auth::id(),
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'tipo' => $request->tipo,
            'categoria' => $request->categoria,
            'data_movimento' => $request->data_movimento,
            'formadepagamento' => $request->formadepagamento,
            'id_caixa' => $request->id_caixa,
            'filial_id' => $request->filial_id,
            
        ]);
         return redirect()->back()->with('success', 'Lançamento atualizado com sucesso.');
       }

    /**
     * Formulário para editar lançamento existente.
     */
    public function edit($id)
    {
        $lancamento = FluxoCaixa::findOrFail($id);
        $filiais = Filial::all();
        return view('fluxocaixa.edit', compact('lancamento', 'filiais'));
    }

    /**
     * Atualiza lançamento existente.
     */
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'tipo' => 'required|in:ENTRADA,SAIDA',
            'data_movimento' => 'required|string',  // talvez string porque vem formatada
            'filial_id' => 'required|exists:filial,id',
        ]);

        // Converter data do formato brasileiro para o padrão do banco
        $data_movimento = Carbon::createFromFormat('d/m/Y', $request->data_movimento)->format('Y-m-d');

        $lancamento = FluxoCaixa::findOrFail($id);

        $lancamento->update([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'tipo' => $request->tipo,
            'categoria' => $request->categoria,
            'data_movimento' => $data_movimento,
            'formadepagamento' => $request->formadepagamento,
            'id_caixa' => $request->id_caixa,
        ]);

        return redirect()->route('fluxocaixa.relatorio')->with('success', 'Lançamento atualizado com sucesso.');
    }


    /**
     * Remove um lançamento.
     */
    public function destroy($id)
    {
        $lancamento = FluxoCaixa::findOrFail($id);
        $lancamento->delete();

        return redirect()->route('fluxocaixa.relatorio')->with('success', 'Lançamento excluído com sucesso.');
    }
    public function gerarExcel(Request $request)
    {
        $request->validate([
            'data_inicio' => ['required', 'date'],
            'data_fim' => ['required', 'date', 'after_or_equal:data_inicio'],
        ]);

        $dataInicio = $request->data_inicio;
        $dataFim = $request->data_fim;
        $idfilial = $request->idfilial;

        return Excel::download(new FluxoCaixaExport($dataInicio, $dataFim, $idfilial), 'relatorio_fluxo_caixa.xlsx');
    }
}
