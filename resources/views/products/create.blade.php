@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Record Product</h1>
        <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="name" id="name" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <div class="flex flex-col">
                <label for="description" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Description</label>
                <input type="text" name="description" id="description" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <div class="flex flex-col">
                <label for="price" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Price</label>
                <input type="number" name="price" id="price" step="0.01" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <div class="flex flex-col">
                <label for="stock" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Stock</label>
                <input type="number" name="stock" id="stock" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <div class="flex flex-col">
                <label for="store_id" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Store</label>
                <select name="store_id" id="store_id" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Create</button>
        </form>
    </div>
@endsection
