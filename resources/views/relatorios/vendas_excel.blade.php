<table>
    <thead>
        <tr>
            <th>Usuário</th>
            <th>Filial</th>
            <th>Abertura</th>
            <th>Fechamento</th>
            <th>Formas Pagamento</th>
            <th>Total Itens</th>
            <th>Total Vendido</th>
        </tr>
    </thead>
    <tbody>
        @foreach($vendas as $v)
        <tr>
            <td>{{ $v->nome_usuario }}</td>
            <td>{{ $v->nomedafilial }}</td>
            <td>{{ $v->abertura }}</td>
            <td>{{ $v->fechamento }}</td>
            <td>{{ $v->formas_pagamento }}</td>
            <td>{{ $v->total_itens }}</td>
            <td>{{ number_format($v->total_vendido, 2, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
