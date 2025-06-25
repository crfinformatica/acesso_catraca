@extends('adminlte::page')

@section('title', 'Relatório Fluxo de Caixa')

@section('content_header')
    <h1>Relatório de Fluxo de Caixa</h1>
@stop

@section('content')

    <form method="POST" action="{{ route('fluxocaixa.relatorio.resultado') }}">
        @csrf
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="idfilial">Filial</label>
                <select name="idfilial" id="idfilial" class="form-control">
                    <option value="">Todas</option>
                    @foreach($filiais as $filial)
                        <option value="{{ $filial->id }}" 
                            {{ (old('idfilial', $request->idfilial ?? '') == $filial->id) ? 'selected' : '' }}>
                            {{ $filial->nome ?? $filial->nomedafilial ?? 'Filial '.$filial->id }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="data_inicio">Data Início</label>
                <input type="date" name="data_inicio" id="data_inicio" class="form-control" 
                    value="{{ old('data_inicio', $request->data_inicio ?? '') }}" required>
            </div>
            <div class="col-md-3">
                <label for="data_fim">Data Fim</label>
                <input type="date" name="data_fim" id="data_fim" class="form-control" 
                    value="{{ old('data_fim', $request->data_fim ?? '') }}" required>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Gerar Relatório</button>
            </div>
        </div>
    </form>

    @if(isset($lancamentos) && count($lancamentos) > 0)
        <div class="mb-3">
            <a href="{{ route('fluxocaixa.relatorio.pdf') }}" 
               onclick="event.preventDefault(); document.getElementById('form-pdf').submit();" 
               class="btn btn-danger">Exportar PDF</a>
            <a href="{{ route('fluxocaixa.relatorio.excel') }}" 
               onclick="event.preventDefault(); document.getElementById('form-excel').submit();" 
               class="btn btn-success">Exportar Excel</a>

            <form id="form-pdf" method="POST" action="{{ route('fluxocaixa.relatorio.pdf') }}" class="d-none">
                @csrf
                <input type="hidden" name="idfilial" value="{{ $request->idfilial ?? '' }}">
                <input type="hidden" name="data_inicio" value="{{ $request->data_inicio ?? '' }}">
                <input type="hidden" name="data_fim" value="{{ $request->data_fim ?? '' }}">
            </form>
            <form id="form-excel" method="POST" action="{{ route('fluxocaixa.relatorio.excel') }}" class="d-none">
                @csrf
                <input type="hidden" name="idfilial" value="{{ $request->idfilial ?? '' }}">
                <input type="hidden" name="data_inicio" value="{{ $request->data_inicio ?? '' }}">
                <input type="hidden" name="data_fim" value="{{ $request->data_fim ?? '' }}">
            </form>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Filial</th>
                    <th>Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lancamentos as $item)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($item->dataregistro)->format('d/m/Y') }}</td>
                        <td>{{ $item->tipo }}</td>
                        <td>R$ {{ number_format($item->valor, 2, ',', '.') }}</td>
                        <td>{{ $item->filial->nome ?? '-' }}</td>
                        <td>{{ $item->descricao }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(isset($lancamentos))
        <div class="alert alert-info">Nenhum lançamento encontrado para os filtros selecionados.</div>
    @endif

@stop
