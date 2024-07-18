@extends('layouts.app')

@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Description</label>
            <input type="text" name="description" required>
        </div>
        <div>
            <label>Price</label>
            <input type="number" name="price" step="0.01" required>
        </div>
        <div>
            <label>Stock</label>
            <input type="number" name="stock" required>
        </div>
        <div>
            <label>Store</label>
            <select name="store_id" required>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
