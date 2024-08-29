<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                    <!-- Enhanced Navigation -->
                    <nav class="bg-blue-900 text-white">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <ul class="flex space-x-4 py-3">
                                <li><a href="{{ route('stores.index') }}" class="px-4 py-2 bg-blue-700 rounded-md hover:bg-blue-600 transition duration-300">Stores</a></li>
                                <li><a href="{{ route('products.index') }}" class="px-4 py-2 bg-blue-700 rounded-md hover:bg-blue-600 transition duration-300">Products</a></li>
                                <li><a href="{{ route('sales.index') }}" class="px-4 py-2 bg-blue-700 rounded-md hover:bg-blue-600 transition duration-300">Sales</a></li>
                            </ul>
                        </div>
                    </nav>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-1">
                <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
