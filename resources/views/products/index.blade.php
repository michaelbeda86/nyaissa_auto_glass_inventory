@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    <a href="{{ route('products.create') }}">Create Product</a>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - {{ $product->description }} - ${{ $product->price }} - Stock: {{ $product->stock }} - Store: {{ $product->store->name }} <a href="{{ route('products.edit', $product->id) }}">Edit</a></li>
        @endforeach
    </ul>
@endsection
