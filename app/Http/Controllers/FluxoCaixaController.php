<?php
namespace App\Http\Controllers;

use App\Models\FluxoCaixa;
use App\Models\Filial;
use Illuminate\Http\Request;

class FluxoCaixaController extends Controller
{
    // Exibe o formulário

    public function index()
    {
        // Puxa todos os lançamentos, já com a filial carregada
        $lancamentos = FluxoCaixa::with('filial')->get();

        // Passa para a view
        return view('fluxocaixa.index', compact('lancamentos'));
    }

    public function create()
    {
        $filiais = Filial::all();
        return view('fluxocaixa.create', compact('filiais'));
    }

    // Salva os dados
    public function store(Request $request)
    {
        $request->validate([
            'idfilial' => 'required|exists:filiais,id',
            'tipo' => 'required|in:Crédito,Débito',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'required|string|max:255',
            'dataregistro' => 'required|date',
        ]);

        FluxoCaixa::create([
            'idfilial' => $request->idfilial,
            'tipo' => $request->tipo,
            'valor' => $request->valor,
            'descricao' => $request->descricao,
            'dataregistro' => $request->dataregistro,
        ]);

        return redirect()->route('fluxocaixa.index')->with('success', 'Movimento registrado com sucesso!');
    }
    public function relatorio()
    {
        $filiais = Filial::all();
        return view('fluxocaixa.relatorio', compact('filiais'));
    }
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


    // (outros métodos como index, edit, update etc.)
}