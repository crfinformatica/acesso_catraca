 @include('layouts.menu')


@section('title', 'Fluxo de Caixa')

@section('content_header')
    <h1>Fluxo de Caixa</h1>
@endsection

@section('content')
    <a href="{{ route('fluxocaixa.create') }}" class="btn btn-success mb-3">Nova Lançamento</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif



    <table class="table">
        <thead>
            <tr>
                <th>Data</th>
                <th>Tipo</th>
                <th>Valor</th>
                <th>Filial</th>
                <th>Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lancamentos as $item)

                <tr>
                    <td>{{ \Carbon\Carbon::parse($item->dataregistro)->format('d/m/Y') }}</td>
                    <td>{{ $item->tipo }}</td>
                    <td>R$ {{ number_format($item->valor, 2, ',', '.') }}</td>
                    <td>{{ $item->filial->nome ?? 'N/A' }}</td>
                    <td>{{ $item->descricao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection