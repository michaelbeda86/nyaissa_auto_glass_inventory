<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Products Order List</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Products Order List</h1>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity to Order</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productsToReorder as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $quantities[$product->id] ?? 0 }} pcs</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
