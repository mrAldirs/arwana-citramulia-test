<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Summary Transaction</title>
    <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Summary Transaction</h1>
    <p>Tanggal: {{ $dateNow }}</p>
    <table class="table table-sm table-striped">
        <thead>
            <tr>
                <th>Reference</th>
                <th>Produk</th>
                <th class="text-end">Price</th>
                <th class="text-end">Sale</th>
                <th class="text-end">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $transaction)
                <tr>
                    <td>{{ $transaction->reference }}</td>
                    <td>{{ $transaction->product->name }}</td>
                    <td class="text-end">{{ 'Rp ' . number_format($transaction->product->price, 0, ',', '.') }}</td>
                    <td class="text-end">{{ $transaction->quantity }} Units</td>
                    <td class="text-end">{{ 'Rp ' . number_format($transaction->total, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-end">Total</td>
                <td class="text-end">{{ 'Rp ' . number_format($total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
