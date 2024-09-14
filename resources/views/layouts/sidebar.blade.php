<!-- resources/views/layouts/sidebar.blade.php -->
<div class="w-64 h-screen bg-gray-800 text-white flex flex-col p-4">
    <!-- Sidebar Title -->
    <div class="text-2xl font-bold mb-6">
        Menu
    </div>

    <!-- Sidebar Links -->
    <nav class="flex flex-col space-y-4">
        <a href="{{ route('stores.index') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800">Stores</a>
        <a href="{{ route('products.index') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800">Products</a>
        <a href="{{ route('sales.index') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800">Sales</a>
        <a href="{{ route('products.orderList') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium hover:bg-blue-800">Reorder List</a>
    </nav>
</div>
