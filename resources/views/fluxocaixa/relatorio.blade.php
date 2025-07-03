@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Relatório de Fluxo de Caixa</h4>
  <form action="{{ route('fluxocaixa.relatorio.resultado') }}" method="POST">
    @csrf
    <div class="row mb-3">
      <div class="col">
        <label for="data_inicio">Data Início</label>
        <input type="date" name="data_inicio" class="form-control" required>
      </div>
      <div class="col">
        <label for="data_fim">Data Fim</label>
        <input type="date" name="data_fim" class="form-control" required>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Gerar Relatório</button>
  </form>
</div>
@endsection
