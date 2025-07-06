@extends('layouts.app')

@section('title', 'Relatório de Fluxo de Caixa')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Relatório de Fluxo de Caixa</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Relatório de Caixa</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="card">
    <div class="card-header">
      <strong>Filtros do Relatório</strong>
    </div>
    <div class="card-body">
      <form action="{{ route('fluxocaixa.relatorio.resultado') }}" method="POST">
        @csrf
        <div class="row">
          <div class="col-md-4">
            <label for="data_inicio">Data Início</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required value="{{ old('data_inicio') }}">
          </div>
          <div class="col-md-4">
            <label for="data_fim">Data Fim</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" required value="{{ old('data_fim') }}">
          </div>
          <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Gerar Relatório</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
