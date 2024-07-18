@extends('layouts.app')

@section('content')
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" value="{{ $product->description }}" required>
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" value="{{ $product->price }}" step="0.01" required>
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock" value="{{ $product->stock }}" required>
        </div>
        <div>
            <label>Store</label>
            <select name="store_id" required>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}" @if($store->id == $product->store_id) selected @endif>{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
