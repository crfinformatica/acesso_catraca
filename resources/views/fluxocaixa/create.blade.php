@extends('layouts.app')

@section('title', 'Fluxo de Caixa')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Fluxo de Caixa - Novo Lançamento</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Fluxo de Caixa</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<a href="{{ route('fluxocaixa.relatorio') }}" class="btn btn-secondary mb-3">Voltar ao Relatório</a>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('fluxocaixa.store') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="filial_id">Filial</label>
                
                <select name="filial_id" id="filial_id" class="form-control" required>
                    <option value="">-- Selecione a Filial --</option>
                    @foreach($filiais as $filial)
                    <option value="{{ $filial->id }}" {{ old('filial_id') == $filial->id ? 'selected' : '' }}>
                        {{ $filial->nomedafilial }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="data_movimento">Data</label>
                <input type="date" name="data_movimento" id="data_movimento" class="form-control" value="{{ old('data_movimento') }}" required>
            </div>

            <div class="form-group">
                <label for="tipo">Tipo</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="">Selecione</option>
                    <option value="ENTRADA" {{ old('tipo') == 'ENTRADA' ? 'selected' : '' }}>Entrada</option>
                    <option value="SAIDA" {{ old('tipo') == 'SAIDA' ? 'selected' : '' }}>Saída</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="3" required>{{ old('descricao') }}</textarea>
            </div>

            <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="{{ old('valor') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salvar</button>
            <a href="{{ route('fluxocaixa.relatorio') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection
