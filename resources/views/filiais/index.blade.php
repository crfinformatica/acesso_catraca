@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Filiais</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Filiais</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<a href="{{ route('filiais.create') }}" class="btn btn-success mb-3">Nova Filial</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome da Filial</th>
                        <th>Endereço</th>
                        <th>Número</th>
                        <th>Bairro</th>
                        <th>Cidade</th>
                        <th>UF</th>
                        <th>CEP</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($filiais as $filial)
                        <tr>
                            <td>{{ $filial->id }}</td>
                            <td>{{ $filial->nomedafilial }}</td>
                            <td>{{ $filial->endereco }}</td>
                            <td>{{ $filial->nun_end }}</td>
                            <td>{{ $filial->bairro }}</td>
                            <td>{{ $filial->cidade }}</td>
                            <td>{{ $filial->uf }}</td>
                            <td>{{ $filial->cep }}</td>
                            <td>
                                <a href="{{ route('filiais.show', $filial) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('filiais.edit', $filial) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('filiais.destroy', $filial) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Confirma exclusão?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" type="submit">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{ $filiais->links() }}
@stop
