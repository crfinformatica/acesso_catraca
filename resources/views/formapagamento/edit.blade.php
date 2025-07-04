@extends('adminlte::page')

@section('title', 'Editar Forma de Pagamento')

@section('content_header')
    <h1>Editar Forma de Pagamento</h1>
@endsection

@section('content')
    <form action="{{ route('formapagamento.update', $forma->id) }}" method="POST">
        @csrf
        @method('PUT')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="descricao" value="{{ old('descricao', $forma->descricao) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('formapagamento.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
@endsection
