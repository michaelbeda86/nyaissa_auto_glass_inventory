@extends('layouts.app')

@section('content')
    <h1>Edit Sale</h1>
    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Product</label>
            <select name="product_id" required>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}" @if($product->id == $sale->product_id) selected @endif>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label>Quantity</label>
            <input type="number" name="quantity" value="{{ $sale->quantity }}" required>
        </div>
        <div>
            <label>Total Price</label>
            <input type="number" name="total_price" value="{{ $sale->total_price }}" step="0.01" required>
        </div>
        <div>
            <label>Sale Date</label>
            <input type="date" name="sale_date" value="{{ $sale->sale_date->format('Y-m-d') }}" required>
        </div>
        <div>
            <label>Store</label>
            <select name="store_id" required>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}" @if($store->id == $sale->store_id) selected @endif>{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
