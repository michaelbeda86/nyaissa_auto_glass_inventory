@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Record Store</h1>
        <form action="{{ route('stores.store') }}" method="POST" class="space-y-4">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="name" id="name" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <div class="flex flex-col">
                <label for="location" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Location</label>
                <input type="text" name="location" id="location" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Create</button>
        </form>
    </div>
@endsection
