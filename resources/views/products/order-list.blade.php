@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Products Order List</h1>

    @if ($productsToReorder->isEmpty())
        <p class="text-gray-700 dark:text-gray-300">No products need to be reordered at the moment.</p>
    @else
        <form action="{{ route('products.order-list.pdf') }}" method="POST" target="_blank">
            @csrf
            <div class="flex justify-end mb-4">
                <button type="submit" class="bg-red-600 py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 transition duration-300">
                    Generate Order
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                            <th class="py-3 px-4 border border-gray-300 dark:border-gray-600 text-left font-medium">Product Name</th>
                            <th class="py-3 px-4 border border-gray-300 dark:border-gray-600 text-left font-medium">Stock</th>
                            <th class="py-3 px-4 border border-gray-300 dark:border-gray-600 text-left font-medium">Reorder Threshold</th>
                            <th class="py-3 px-4 border border-gray-300 dark:border-gray-600 text-left font-medium">Quantity to Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productsToReorder as $product)
                            <tr class="border-b border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                                <td class="py-3 px-4 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100">{{ $product->name }}</td>
                                <td class="py-3 px-4 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100">{{ $product->stock }}</td>
                                <td class="py-3 px-4 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100">{{ $product->reorder_threshold }}</td>
                                <td class="py-3 px-4 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-gray-100">
                                    <input type="number" name="quantities[{{ $product->id }}]" min="1" class="border border-gray-300 rounded p-2 w-full dark:bg-gray-800 dark:text-gray-100" placeholder="Enter Quantity">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    @endif
</div>
@endsection
