@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Produtos</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Produtos</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<a href="{{ route('produtos.create') }}" class="btn btn-success mb-3">Novo Produto</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card card-laranja">
  <div class="card-header">
    <h3 class="card-title">Lista de Produtos</h3>
  </div>
  <div class="card-body table-responsive p-0">
    <table class="table table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Nome do Usuário</th>
                <th>Data</th>
                <th style="width: 160px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($produtos as $produto)
                <tr>
                    <td>{{ $produto->idproduto }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                    <td>{{ optional($produto->userCriador)->name }}</td>
                    <td>
                        {{ $produto->data_ins ? \Carbon\Carbon::parse($produto->data_ins)->format('d/m/Y') : '' }}
                    </td>
                    <td>
                        <a href="{{ route('produtos.edit', $produto->idproduto) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('produtos.destroy', $produto->idproduto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Nenhum produto encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
  </div>
</div>
@endsection
