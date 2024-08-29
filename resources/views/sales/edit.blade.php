@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Edit Sale</h1>
        <form action="{{ route('sales.update', $sale->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="product_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Product</label>
                <select name="product_id" id="product_id" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}" @if($product->id == $sale->product_id) selected @endif>{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Quantity</label>
                <input type="number" name="quantity" id="quantity" value="{{ $sale->quantity }}" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" required>
            </div>

            <div class="mb-4">
                <label for="total_price" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Total Price</label>
                <input type="number" name="total_price" id="total_price" value="{{ $sale->total_price }}" step="0.01" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" required>
            </div>

            <div class="mb-4">
                <label for="sale_date" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Sale Date</label>
                <input type="date" name="sale_date" id="sale_date" value="{{ $sale->sale_date->format('Y-m-d') }}" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" required>
            </div>

            <div class="mb-4">
                <label for="store_id" class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">Store</label>
                <select name="store_id" id="store_id" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" required>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" @if($store->id == $sale->store_id) selected @endif>{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Update</button>
            </div>
        </form>
    </div>
@endsection
