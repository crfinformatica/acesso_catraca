@extends('layouts.app')

@section('content')
<div class="container">
  <h4>Relatório de Fluxo de Caixa</h4>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Data</th>
        <th>Descrição</th>
        <th>Tipo</th>
        <th>Forma Pagamento</th>
        <th>Valor</th>
      </tr>
    </thead>
    <tbody>
      @foreach($fluxos as $f)
      <tr>
        <td>{{ \Carbon\Carbon::parse($f->data_movimento)->format('d/m/Y') }}</td>
        <td>{{ $f->descricao }}</td>
        <td>{{ $f->tipo }}</td>
        <td>{{ $f->formadepagamento }}</td>
        <td>R$ {{ number_format($f->valor, 2, ',', '.') }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <h5>Total Entrada: <strong class="text-success">R$ {{ number_format($totalEntrada, 2, ',', '.') }}</strong></h5>
  <h5>Total Saída: <strong class="text-danger">R$ {{ number_format($totalSaida, 2, ',', '.') }}</strong></h5>

  <form action="{{ route('fluxocaixa.relatorio.pdf') }}" method="POST" target="_blank" class="mt-3">
    @csrf
    <input type="hidden" name="data_inicio" value="{{ request('data_inicio') }}">
    <input type="hidden" name="data_fim" value="{{ request('data_fim') }}">
    <button type="submit" class="btn btn-danger">Exportar PDF</button>
  </form>
</div>
@endsection
