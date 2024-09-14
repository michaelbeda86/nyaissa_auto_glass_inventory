@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Products</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('products.create') }}" class="bg-blue-600 py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Add Product</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Name</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Category</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Unit Price</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Stock</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Reorder Threshold</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Store</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr class="border-b border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $product->name }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $product->category }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">Tshs {{ $product->formatted_unit_price }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $product->stock }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $product->reorder_threshold }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $product->store->name }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600">
                                <a href="{{ route('products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500 transition duration-300">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
