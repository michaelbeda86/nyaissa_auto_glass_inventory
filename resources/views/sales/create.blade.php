@extends('layouts.app')

@section('content')
    <h1>Record Sale</h1>
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div>
            <label>Product</label>
            <select name="product_id" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Quantity</label>
            <input type="number" name="quantity" required>
        </div>
        <div>
            <label>Total Price</label>
            <input type="number" name="total_price" step="0.01" required>
        </div>
        <div>
            <label>Sale Date</label>
            <input type="date" name="sale_date" required>
        </div>
        <div>
            <label>Store</label>
            <select name="store_id" required>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Record</button>
    </form>
@endsection
