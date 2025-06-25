@extends('adminlte::page')

@section('title', 'Relatório Fluxo de Caixa')

@section('content_header')
    <h1>Relatório Fluxo de Caixa</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('fluxocaixa.relatorio.resultado') }}">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="idfilial">Filial</label>
                <select name="idfilial" id="idfilial" class="form-control">
                    <option value="">Todas</option>
                    @foreach($filiais as $filial)
                        <option value="{{ $filial->id }}" {{ (old('idfilial', $request->idfilial ?? '') == $filial->id) ? 'selected' : '' }}>
                            {{ $filial->nomedafilial }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label for="data_inicio">Data Início</label>
                <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ old('data_inicio', $request->data_inicio ?? '') }}" required>
            </div>

            <div class="form-group col-md-3">
                <label for="data_fim">Data Fim</label>
                <input type="date" name="data_fim" id="data_fim" class="form-control" value="{{ old('data_fim', $request->data_fim ?? '') }}" required>
            </div>

            <div class="form-group col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Gerar Relatório</button>
            </div>
        </div>
    </form>

    @isset($lancamentos)
        <hr>

        <h3>Resultados</h3>

        @if($lancamentos->isEmpty())
            <div class="alert alert-info">Nenhum lançamento encontrado para os filtros informados.</div>
        @else
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
                    @foreach($lancamentos as $lancamento)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($lancamento->dataregistro)->format('d/m/Y') }}</td>
                            <td>{{ $lancamento->tipo }}</td>
                            <td>R$ {{ number_format($lancamento->valor, 2, ',', '.') }}</td>
                            <td>{{ $lancamento->filial->nomedafilial ?? '-' }}</td>
                            <td>{{ $lancamento->descricao }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endisset
@stop
