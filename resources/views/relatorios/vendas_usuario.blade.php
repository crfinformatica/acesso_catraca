@extends('layouts.app')

@section('title', 'Relatório de Vendas por Usuário')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Relatório de Vendas por Usuário</h1>
    </div>
</div>

<div class="container-fluid">
    <form method="GET" action="{{ route('relatorio.vendas') }}" class="mb-4 row g-2">
        <div class="col-md-3">
            <label>Data Início:</label>
            <input type="date" name="data_inicio" class="form-control" value="{{ request('data_inicio') }}" required>
        </div>
        <div class="col-md-3">
            <label>Data Fim:</label>
            <input type="date" name="data_fim" class="form-control" value="{{ request('data_fim') }}" required>
        </div>
        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
        @if($vendas ?? false)
        <div class="col-md-3 d-flex align-items-end justify-content-end">
            <a href="{{ route('relatorio.vendas.pdf', request()->all()) }}" class="btn btn-danger me-2">PDF</a>
            <a href="{{ route('relatorio.vendas.excel', request()->all()) }}" class="btn btn-success">Excel</a>
        </div>
        @endif
    </form>

    @if(isset($vendas) && $vendas->count())
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Usuário</th>
                <th>Filial</th>
                <th>Abertura</th>
                <th>Fechamento</th>
                <th>Formas Pagamento</th>
                <th>Total Itens</th>
                <th>Total Vendido</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $v)
            <tr>
                <td>{{ $v->nome_usuario }}</td>
                <td>{{ $v->nomedafilial }}</td>
                <td>{{ $v->abertura }}</td>
                <td>{{ $v->fechamento }}</td>
                <td>{{ $v->formas_pagamento }}</td>
                <td>{{ $v->total_itens }}</td>
                <td>R$ {{ number_format($v->total_vendido, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @elseif(request('data_inicio'))
        <div class="alert alert-warning">Nenhuma venda encontrada no período informado.</div>
    @endif
</div>
@endsection
