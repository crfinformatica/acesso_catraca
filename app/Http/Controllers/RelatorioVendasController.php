<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Filial;
use App\Models\User;

class RelatorioVendasController extends Controller
{
    public function index(Request $request)
    {
        // Recupera todos os filtros do request
        $dataInicio = $request->input('data_inicio');
        $dataFim = $request->input('data_fim');
        $idFilial = $request->input('idfilial');
        $idUser = $request->input('iduser');
        $formaPagamento = $request->input('formadepagamento');

        // Listas para o formulário
        $filiais = Filial::all();
        $usuarios = User::orderBy('name')->get();

        // Apenas gera consulta se datas estiverem preenchidas
        $vendas = collect();

        if ($dataInicio && $dataFim) {
            $request->validate([
                'data_inicio' => 'required|date',
                'data_fim' => 'required|date|after_or_equal:data_inicio',
            ]);

            $vendas = DB::table('caixa_item as ci')
                ->join('caixa_header as ch', 'ci.caixa_header_id', '=', 'ch.id')
                ->join('filial as f', 'ch.idfilial', '=', 'f.id')
                ->join('users as u', 'ci.iduser', '=', 'u.id')
                ->select(
                    'u.name as nome_usuario',
                    'f.nomedafilial',
                    DB::raw("DATE_FORMAT(ch.datahora_abertura, '%d/%m/%Y %H:%i') as abertura"),
                    DB::raw("DATE_FORMAT(ch.datahora_fechamento, '%d/%m/%Y %H:%i') as fechamento"),
                    DB::raw("SUM(ci.valorapagar) as total_vendido"),
                    DB::raw("COUNT(ci.id) as total_itens"),
                    DB::raw("GROUP_CONCAT(DISTINCT ci.formadepagamento SEPARATOR ', ') as formas_pagamento")
                )
                ->whereBetween('ci.datetime', [$dataInicio, $dataFim]);

            if ($idFilial) {
                $vendas->where('ch.idfilial', $idFilial);
            }

            if ($idUser) {
                $vendas->where('ci.iduser', $idUser);
            }

            if ($formaPagamento) {
                $vendas->where('ci.formadepagamento', $formaPagamento);
            }

            $vendas = $vendas
                ->groupBy('u.name', 'f.nomedafilial', 'ch.datahora_abertura', 'ch.datahora_fechamento')
                ->orderByDesc('ch.datahora_abertura')
                ->get();
        }

        return view('relatorios.vendas_usuario', compact(
            'vendas',
            'dataInicio',
            'dataFim',
            'idFilial',
            'idUser',
            'formaPagamento',
            'filiais',
            'usuarios'
        ));
    }
}
