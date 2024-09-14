@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Sales</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('sales.create') }}" class="bg-blue-600 py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Record Sale</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-lg">
                <thead>
                    <tr class="bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Product</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Quantity</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Total Price</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Sale Date</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Store</th>
                        <th class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sales as $sale)
                        <tr class="border-b border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition duration-200">
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $sale->product->name }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $sale->quantity }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">Tshs {{ $sale->formatted_total_price }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $sale->sale_date->format('Y-m-d') }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600 text-gray-800 dark:text-gray-200">{{ $sale->store->name }}</td>
                            <td class="py-2 px-4 border border-gray-300 dark:border-gray-600">
                                <a href="{{ route('sales.edit', $sale->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500 transition duration-300">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
