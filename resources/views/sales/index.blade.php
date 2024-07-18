@extends('layouts.app')

@section('content')
    <h1>Sales</h1>
    <a href="{{ route('sales.create') }}">Record Sale</a>
    <ul>
        @foreach ($sales as $sale)
            <li>Product: {{ $sale->product->name }} - Quantity: {{ $sale->quantity }} - Total: ${{ $sale->total_price }} - Date: {{ $sale->sale_date }} - Store: {{ $sale->store->name }} <a href="{{ route('sales.edit', $sale->id) }}">Edit</a></li>
        @endforeach
    </ul>
@endsection
