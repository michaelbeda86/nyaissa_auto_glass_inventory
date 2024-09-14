@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Stores</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('stores.create') }}" class="bg-blue-600 py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Create Store</a>
        </div>
        <ul class="divide-y divide-gray-200 dark:divide-gray-700">
            @foreach ($stores as $store)
                <li class="py-4 flex justify-between items-center">
                    <div class="text-gray-800 dark:text-gray-200">
                        {{ $store->name }} - {{ $store->location }}
                    </div>
                    <a href="{{ route('stores.edit', $store->id) }}" class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-500 transition duration-300">Edit</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
