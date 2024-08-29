@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Description</label>
                <input type="text" name="description" value="{{ $product->description }}" required class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Price</label>
                <input type="number" name="price" value="{{ $product->price }}" step="0.01" required class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}" required class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Store</label>
                <select name="store_id" required class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" @if($store->id == $product->store_id) selected @endif>{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Update</button>
        </form>
    </div>
@endsection
