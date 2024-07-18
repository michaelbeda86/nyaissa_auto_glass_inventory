<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Store;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with(['product', 'store'])->get();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $products = Product::all();
        $stores = Store::all();
        return view('sales.create', compact('products', 'stores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'sale_date' => 'required|date',
            'store_id' => 'required|exists:stores,id',
        ]);

        Sale::create($request->all());

        return redirect()->route('sales.index')
                        ->with('success', 'Sale recorded successfully.');
    }

    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        $products = Product::all();
        $stores = Store::all();
        return view('sales.edit', compact('sale', 'products', 'stores'));
    }

    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer',
            'total_price' => 'required|numeric',
            'sale_date' => 'required|date',
            'store_id' => 'required|exists:stores,id',
        ]);

        $sale->update($request->all());

        return redirect()->route('sales.index')
                        ->with('success', 'Sale updated successfully.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')
                        ->with('success', 'Sale deleted successfully.');
    }
}
