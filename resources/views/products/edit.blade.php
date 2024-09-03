@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Edit Product</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Name</label>
                <input type="text" name="name" value="{{ $product->name }}" required class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Category</label>
                <select name="category" id="category" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300 dark:border-gray-600" required>
                    <option value="Windscreen" @if($product->category == 'Windscreen') selected @endif>Windscreen</option>
                    <option value="Boot Glass" @if($product->category == 'Boot Glass') selected @endif>Boot Glass</option>
                    <option value="Cabin Glass" @if($product->category == 'Cabin Glass') selected @endif>Cabin Glass</option>
                    <option value="R1 Sliding" @if($product->category == 'R1 Sliding') selected @endif>R1 Sliding</option>
                    <option value="R2 Sliding" @if($product->category == 'R2 Sliding') selected @endif>R2 Sliding</option>
                    <option value="R3 Sliding" @if($product->category == 'R3 Sliding') selected @endif>R3 Sliding</option>
                    <option value="R4 Sliding" @if($product->category == 'R4 Sliding') selected @endif>R4 Sliding</option>
                    <option value="L1 Sliding" @if($product->category == 'L1 Sliding') selected @endif>L1 Sliding</option>
                    <option value="L2 Sliding" @if($product->category == 'L2 Sliding') selected @endif>L2 Sliding</option>
                    <option value="L3 Sliding" @if($product->category == 'L3 Sliding') selected @endif>L3 Sliding</option>
                    <option value="L4 Sliding" @if($product->category == 'L4 Sliding') selected @endif>L4 Sliding</option>
                    <option value="Side Fix R" @if($product->category == 'Side Fix R') selected @endif>Side Fix R</option>
                    <option value="Side Fix L" @if($product->category == 'Side Fix L') selected @endif>Side Fix L</option>
                    <option value="Quarter Glass" @if($product->category == 'Quarter Glass') selected @endif>Quarter Glass</option>
                    <option value="Roof Glass" @if($product->category == 'Roof Glass') selected @endif>Roof Glass</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Unit Price</label>
                <input type="number" name="unit_price" value="{{ $product->unit_price }}" step="0.01" required class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Stock</label>
                <input type="number" name="stock" value="{{ $product->stock }}" required class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            </div>
            <div>
                <label class="block text-gray-700 dark:text-gray-300">Store</label>
                <select name="store_id" required class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}" @if($store->id == $product->store_id) selected @endif>{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Update</button>
        </form>
    </div>
@endsection
