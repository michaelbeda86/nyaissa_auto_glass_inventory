<!-- resources/views/layouts/sidebar.blade.php -->
<div class="w-64 h-screen bg-gray-800 text-white flex flex-col p-4">
    <!-- Sidebar Title -->
    <div class="text-2xl font-bold mb-6">
        Menu
    </div>

    <!-- Sidebar Links -->
    <nav class="flex flex-col space-y-4">
        <a href="{{ route('stores.index') }}" class="p-3 bg-gray-700 hover:bg-gray-600 rounded-md transition duration-200">Stores</a>
        <a href="{{ route('products.index') }}" class="p-3 bg-gray-700 hover:bg-gray-600 rounded-md transition duration-200">Products</a>
        <a href="{{ route('sales.index') }}" class="p-3 bg-gray-700 hover:bg-gray-600 rounded-md transition duration-200">Sales</a>
    </nav>
</div>
