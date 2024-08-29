@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Record Sale</h1>
        <form action="{{ route('sales.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="product_id" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Product</label>
                <select name="product_id" id="product_id" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label for="quantity" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <div class="flex flex-col">
                <label for="total_price" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Total Price</label>
                <input type="number" name="total_price" id="total_price" step="0.01" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <div class="flex flex-col">
                <label for="sale_date" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Sale Date</label>
                <input type="date" name="sale_date" id="sale_date" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <div class="flex flex-col">
                <label for="store_id" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Store</label>
                <select name="store_id" id="store_id" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Record</button>
        </form>
    </div>
@endsection
