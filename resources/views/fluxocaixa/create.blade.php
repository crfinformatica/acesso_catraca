@extends('adminlte::page')

@section('title', 'Fluxo de Caixa - Novo Lançamento')

@section('content_header')
    <h1>Novo Lançamento</h1>
@stop

@section('content')
    <form action="{{ route('fluxocaixa.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="dataregistro">Data</label>
            <input type="date" name="dataregistro" id="dataregistro" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <select name="tipo" id="tipo" class="form-control" required>
                <option value="">Selecione</option>
                <option value="Crédito">Crédito</option>
                <option value="Débito">Débito</option>
            </select>
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="idfilial">Filial</label>
            <select name="idfilial" id="idfilial" class="form-control" required>
                @foreach($filiais as $filial)
                    <option value="{{ $filial->id }}">{{ $filial->nomedafilial }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('fluxocaixa.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@stop
