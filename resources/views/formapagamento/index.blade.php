@extends('layouts.app')

@section('title', 'Produtos')

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Forma de Pagamento</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Forma de Pagamento</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<a href="{{ route('formapagamento.create') }}" class="btn btn-success mb-3">Nova Forma de pagamento</a>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formas as $forma)
                <tr>
                    <td>{{ $forma->id }}</td>
                    <td>{{ $forma->descricao }}</td>
                    <td>
                        <a href="{{ route('formapagamento.edit', $forma->id) }}" class="btn btn-primary btn-sm">Editar</a>
                        <form action="{{ route('formapagamento.destroy', $forma->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
