@extends('layouts.app')

@section('title', 'Editar Lançamento')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Editar Lançamento</h1>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
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

<form action="{{ route('fluxocaixa.update', $lancamento->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="filial_id">Filial</label>
        <select name="filial_id" id="filial_id" class="form-control" required>
            @foreach($filiais as $filial)
                <option value="{{ $filial->id }}" {{ old('filial_id', $lancamento->filial_id) == $filial->id ? 'selected' : '' }}>
                    {{ $filial->nomedafilial }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="data_movimento">Data</label>
        <input type="text" name="data_movimento" id="data_movimento" class="form-control"
            value="{{ old('data_movimento', \Carbon\Carbon::parse($lancamento->data_movimento)->format('d/m/Y')) }}"
            required>
    </div>

    <div class="form-group">
        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo" class="form-control" required>
            <option value="ENTRADA" {{ old('tipo', $lancamento->tipo) == 'ENTRADA' ? 'selected' : '' }}>Entrada</option>
            <option value="SAIDA" {{ old('tipo', $lancamento->tipo) == 'SAIDA' ? 'selected' : '' }}>Saída</option>
        </select>
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="descricao" class="form-control" rows="3" required>{{ old('descricao', $lancamento->descricao) }}</textarea>
    </div>

    <div class="form-group">
        <label for="valor">Valor</label>
        <input type="number" step="0.01" name="valor" id="valor" class="form-control"
            value="{{ old('valor', $lancamento->valor) }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    <a href="{{ route('fluxocaixa.relatorio') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('data_movimento');
    if (input) {
      input.addEventListener('input', function (e) {
        let v = e.target.value.replace(/\D/g, '');
        if (v.length >= 2) v = v.slice(0, 2) + '/' + v.slice(2);
        if (v.length >= 5) v = v.slice(0, 5) + '/' + v.slice(5, 9);
        e.target.value = v;
      });
    }
  });
</script>
@endsection
