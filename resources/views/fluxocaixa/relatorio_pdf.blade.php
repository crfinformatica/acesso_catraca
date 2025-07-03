<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Relatório de Fluxo de Caixa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        header {
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header .logo {
            max-height: 60px;
        }

        header .info {
            text-align: right;
            font-size: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        table th,
        table td {
            border: 1px solid #333;
            padding: 6px 8px;
            text-align: left;
        }

        table th {
            background-color: #f0f0f0;
        }

        .footer {
            margin-top: 30px;
            font-size: 10px;
            text-align: center;
            color: #666;
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <img src="{{ public_path('img/logo.png') }}" alt="Logo" style="max-height:60px;">
        </div>
        <div class="info">
            <div>{{ date('d/m/Y') }}</div>
            <div>{{ date('H:i:s') }}</div>
        </div>
    </header>

    <h1>Relatório de Fluxo de Caixa</h1>

    <p><strong>Período:</strong>
        {{ \Carbon\Carbon::parse($dataInicio)->format('d/m/Y') }} a
        {{ \Carbon\Carbon::parse($dataFim)->format('d/m/Y') }}
    </p>

    @if($filial)
    <p><strong>Filial:</strong> {{ $filial->nome }}</p>
    @else
    <p><strong>Filial:</strong> Todas</p>
    @endif


    <table>
        <thead>
            <tr>
                <th>Filial</th>
                <th>Data</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Valor (R$)</th>


            </tr>
        </thead>
        <tbody>
            @forelse($lancamentos as $item)
            <tr>
                <td>{{ $item->filial->nomedafilial ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($item->dataregistro)->format('d/m/Y') }}</td>
                <td>{{ $item->tipo }}</td>
                <td>{{ $item->descricao }}</td>
                <td style="text-align:right;">{{ number_format($item->valor, 2, ',', '.') }}</td>


            </tr>
            @empty
            <tr>
                <td colspan="5" style="text-align:center;">Nenhum registro encontrado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="footer">
        Relatório gerado pelo sistema - {{ date('d/m/Y H:i:s') }}
    </div>

</body>

</html>