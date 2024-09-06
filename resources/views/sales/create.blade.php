@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-gray-100">Record Sale</h1>
        <form action="{{ route('sales.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Store Selection -->
            <div class="flex flex-col">
                <label for="store_id" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Store</label>
                <select name="store_id" id="store_id" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
                    <option value="" disabled selected>Select a store</option>
                    @foreach ($stores as $store)
                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Product Selection (dynamically populated based on selected store) -->
            <div class="flex flex-col">
                <label for="product_id" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Product</label>
                <select name="product_id" id="product_id" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
                    <option value="" disabled selected>Select a product</option>
                    <!-- Options will be populated dynamically -->
                </select>
            </div>

            <!-- Unit Price -->
            <div class="flex flex-col">
                <label for="unit_price" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Unit Price</label>
                <input type="text" name="unit_price" id="unit_price" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" readonly>
            </div>

            <!-- Quantity -->
            <div class="flex flex-col">
                <label for="quantity" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                <input type="number" name="quantity" id="quantity" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>

            <!-- Total Price -->
            <div class="flex flex-col">
                <label for="total_price" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Total Price</label>
                <input type="text" name="total_price" id="total_price" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" readonly>
            </div>

            <!-- Sale Date -->
            <div class="flex flex-col">
                <label for="sale_date" class="mb-2 font-medium text-gray-700 dark:text-gray-300">Sale Date</label>
                <input type="date" name="sale_date" id="sale_date" class="border border-gray-300 dark:border-gray-600 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-300" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 transition duration-300">Record Sale</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const storeSelect = document.getElementById('store_id');
            const productSelect = document.getElementById('product_id');
            const unitPriceInput = document.getElementById('unit_price');
            const quantityInput = document.getElementById('quantity');
            const totalPriceInput = document.getElementById('total_price');

            // Fetch products when a store is selected
            storeSelect.addEventListener('change', function () {
                const storeId = this.value;

                // Clear the current product options
                productSelect.innerHTML = '<option value="" disabled selected>Select a product</option>';
                unitPriceInput.value = '';
                totalPriceInput.value = '';

                // Make AJAX request to fetch products for the selected store
                fetch(`/stores/${storeId}/products`)
                    .then(response => response.json())
                    .then(products => {
                        products.forEach(product => {
                            let option = document.createElement('option');
                            option.value = product.id;
                            option.setAttribute('data-price', product.unit_price);
                            option.textContent = product.name;
                            productSelect.appendChild(option);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching products:', error);
                    });
            });

            // Update unit price when a product is selected
            productSelect.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                const unitPrice = selectedOption.getAttribute('data-price');
                unitPriceInput.value = unitPrice;
                calculateTotalPrice();
            });

            // Calculate total price when quantity is entered
            quantityInput.addEventListener('input', calculateTotalPrice);

            function calculateTotalPrice() {
                const unitPrice = parseFloat(unitPriceInput.value);
                const quantity = parseInt(quantityInput.value);
                if (!isNaN(unitPrice) && !isNaN(quantity)) {
                    totalPriceInput.value = unitPrice * quantity;
                } else {
                    totalPriceInput.value = '';
                }
            }
        });
    </script>
@endsection
