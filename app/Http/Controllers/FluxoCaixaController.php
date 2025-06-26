<?php

namespace App\Http\Controllers;

use App\Models\FluxoCaixa;
use App\Models\Filial;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FluxoCaixaExport;

class FluxoCaixaController extends Controller
{
    public function index()
    {
        $lancamentos = FluxoCaixa::with('filial')->get();
        return view('fluxocaixa.index', compact('lancamentos'));
    }

    public function create()
    {
        $filiais = Filial::all();
        return view('fluxocaixa.create', compact('filiais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idfilial' => 'required|exists:filiais,id',
            'tipo' => 'required|in:Crédito,Débito',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'required|string|max:255',
            'dataregistro' => 'required|date',
        ]);

        FluxoCaixa::create($request->only(['idfilial', 'tipo', 'valor', 'descricao', 'dataregistro']));
        return redirect()->route('fluxocaixa.index')->with('success', 'Movimento registrado com sucesso!');
    }

    // 🔎 Exibir formulário do relatório
    public function relatorio()
    {
        $filiais = Filial::all();
        return view('fluxocaixa.relatorio', compact('filiais'));
    }

    // 🔍 Buscar resultado filtrado
    public function relatorioResultado(Request $request)
    {
        $request->validate([
            'idfilial' => 'nullable|exists:filiais,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        $query = FluxoCaixa::with('filial')
            ->whereBetween('dataregistro', [$request->data_inicio, $request->data_fim]);

        if ($request->idfilial) {
            $query->where('idfilial', $request->idfilial);
        }

        $lancamentos = $query->orderBy('dataregistro')->get();
        
        $filiais = Filial::all();

        return view('fluxocaixa.relatorio', compact('lancamentos', 'filiais', 'request'));
    }

    // 📄 Gerar PDF
    public function gerarPdf(Request $request)
    {
        $request->validate([
            'idfilial' => 'nullable|exists:filiais,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        $query = FluxoCaixa::with('filial')
            ->whereBetween('dataregistro', [$request->data_inicio, $request->data_fim]);

        if ($request->idfilial) {
            $query->where('idfilial', $request->idfilial);
        }

        $lancamentos = $query->get();

        $pdf = PDF::loadView('fluxocaixa.relatorio_pdf', compact('lancamentos', 'request'));
        return $pdf->download('relatorio_fluxo_caixa.pdf');
    }

    // 📊 Gerar Excel
    public function gerarExcel(Request $request)
    {
        $request->validate([
            'idfilial' => 'nullable|exists:filiais,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after_or_equal:data_inicio',
        ]);

        return Excel::download(new FluxoCaixaExport($request), 'relatorio_fluxo_caixa.xlsx');
    }
     public function verificaCaixaAberto(Request $request)
    {
        $request->validate([
            'iduser' => 'required|integer',
        ]);

        $caixaAberto = DB::table('caixa_header')
            ->where('iduser', $request->iduser)
            ->whereNull('datahora_fechamento')
            ->exists();

        return response()->json(['caixa_aberto' => $caixaAberto]);
    }

}
