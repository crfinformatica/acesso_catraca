@extends('layouts.app')

@section('title', 'Fluxo de Caixa - Lançamentos')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Lançamentos do Fluxo de Caixa</h1>
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

<div class="container-fluid mb-3">
  <a href="{{ route('fluxocaixa.create') }}" class="btn btn-success">Novo Lançamento</a>
  <a href="{{ route('fluxocaixa.relatorio') }}" class="btn btn-secondary">Voltar ao Filtro</a>

  <form action="{{ route('fluxocaixa.relatorio.pdf') }}" method="POST" class="d-inline-block ml-2">
    @csrf
    <input type="hidden" name="data_inicio" value="{{ request('data_inicio') ?? old('data_inicio') }}">
    <input type="hidden" name="data_fim" value="{{ request('data_fim') ?? old('data_fim') }}">
    <button type="submit" class="btn btn-danger">Exportar PDF</button>
  </form>

  <form action="{{ route('fluxocaixa.relatorio.excel') }}" method="POST" class="d-inline-block ml-2">
    @csrf
    <input type="hidden" name="data_inicio" value="{{ request('data_inicio') ?? old('data_inicio') }}">
    <input type="hidden" name="data_fim" value="{{ request('data_fim') ?? old('data_fim') }}">
    <button type="submit" class="btn btn-success">Exportar Excel</button>
  </form>
</div>

@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card">
  <div class="card-body table-responsive p-0">
    <table class="table table-hover table-striped table-bordered">
      <thead class="thead-light">
        <tr>
          <th>ID</th>
          <th>Data</th>
          <th>Descrição</th>
          <th>Valor (R$)</th>
          <th>Tipo</th>
          <th>Filial</th>
          <th>Forma de Pagamento</th>
          <th>Categoria</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse($fluxos as $lancamento)
          <tr>
            <td>{{ $lancamento->id }}</td>
            <td>{{ \Carbon\Carbon::parse($lancamento->data_movimento)->format('d/m/Y') }}</td>
            <td>{{ $lancamento->descricao }}</td>
            <td class="{{ $lancamento->tipo === 'ENTRADA' ? 'text-success' : 'text-danger' }}">
              {{ number_format($lancamento->valor, 2, ',', '.') }}
            </td>
            <td>{{ ucfirst(strtolower($lancamento->tipo)) }}</td>
            <td>{{ $lancamento->filial->nomedafilial ?? '—' }}</td>
            <td>{{ $lancamento->formadepagamento ?? '—' }}</td>
            <td>{{ $lancamento->categoria ?? '—' }}</td>
            <td>
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDetalhes{{ $lancamento->id }}">
                Ver
              </button>
              <a href="{{ route('fluxocaixa.edit', $lancamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
              <form action="{{ route('fluxocaixa.destroy', $lancamento->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Confirma exclusão?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="9" class="text-center">Nenhum lançamento encontrado para o período selecionado.</td>
          </tr>
        @endforelse
      </tbody>
      <tfoot>
        <tr>
          <th colspan="3" class="text-right">Totais:</th>
          <th class="text-success">Entradas: R$ {{ number_format($totalEntrada, 2, ',', '.') }}</th>
          <th class="text-danger">Saídas: R$ {{ number_format($totalSaida, 2, ',', '.') }}</th>
          <th colspan="4" class="font-weight-bold">Saldo Final: R$ {{ number_format($saldoFinal, 2, ',', '.') }}</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>

{{-- Paginação, caso ativa --}}
{{-- {{ $fluxos->links() }} --}}

{{-- Modais de Detalhes --}}
@foreach($fluxos as $lancamento)
<div class="modal fade" id="modalDetalhes{{ $lancamento->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $lancamento->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalLabel{{ $lancamento->id }}">Detalhes do Lançamento #{{ $lancamento->id }}</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><strong>Data:</strong> {{ \Carbon\Carbon::parse($lancamento->data_movimento)->format('d/m/Y') }}</p>
        <p><strong>Descrição:</strong> {{ $lancamento->descricao }}</p>
        <p><strong>Valor:</strong> R$ {{ number_format($lancamento->valor, 2, ',', '.') }}</p>
        <p><strong>Tipo:</strong> {{ $lancamento->tipo }}</p>
        <p><strong>Filial:</strong> {{ $lancamento->filial->nomedafilial ?? '—' }}</p>
        <p><strong>Forma de Pagamento:</strong> {{ $lancamento->formadepagamento ?? '—' }}</p>
        <p><strong>Categoria:</strong> {{ $lancamento->categoria ?? '—' }}</p>
        <p><strong>Criado em:</strong> {{ $lancamento->created_at->format('d/m/Y H:i') }}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection
