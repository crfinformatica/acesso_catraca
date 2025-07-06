<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Vendas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
        th { background-color: #eee; }
    </style>
</head>
<body>
    <h2>Relatório de Vendas por Usuário</h2>
    <p><strong>Período:</strong> {{ \Carbon\Carbon::parse($dataInicio)->format('d/m/Y') }} a {{ \Carbon\Carbon::parse($dataFim)->format('d/m/Y') }}</p>

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
                <td>R$ {{ number_format($v->total_vendido, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
