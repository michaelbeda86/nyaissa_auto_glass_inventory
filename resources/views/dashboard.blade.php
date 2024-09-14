@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Total Income for Today -->
        <div class="bg-blue-800 shadow-lg rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-2">Total Income Today</h2>
            <p class="text-2xl font-bold">
                Tshs {{ number_format($totalIncomeToday, 2) }}
            </p>
        </div>

        <!-- Sales Made Today -->
        <div class="bg-blue-800 shadow-lg rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-2">Sales Made Today</h2>
            <ul class="mt-4">
                @if ($salesToday->isEmpty())
                    <li>No sales have been made today.</li>
                @else
                    @foreach ($salesToday as $sale)
                        <li>
                            <p class="font-medium">Product: {{ $sale->product->name }}</p>
                            <p class="font-medium">Quantity: {{ $sale->quantity }}</p>
                            <p class="font-bold mt-4">Total Price: Tshs {{ number_format($sale->total_price, 2) }}</p>
                            <hr class="my-2">
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
@endsection
