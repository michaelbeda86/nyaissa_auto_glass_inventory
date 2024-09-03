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

        // Format prices for display with thousand separators and without decimals
        foreach ($sales as $sale) {
            $sale->formatted_unit_price = number_format($sale->unit_price, 0, '.', ',');  // Format unit price without decimal, with thousand separators
            $sale->formatted_total_price = number_format($sale->total_price, 0, '.', ','); // Format total price without decimal, with thousand separators
        }

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
            'quantity' => 'required|integer|min:1',
            'sale_date' => 'required|date',
            'store_id' => 'required|exists:stores,id',
        ]);

        $product = Product::findOrFail($request->product_id);

        // Ensure there is enough stock
        if ($product->stock < $request->quantity) {
            return redirect()->back()->withErrors(['quantity' => 'Not enough stock available for this product.']);
        }

        // Calculate the total price
        $totalPrice = $product->unit_price * $request->quantity;

        // Reduce the stock of the product
        $product->stock -= $request->quantity;
        $product->save();

        // Create the sale record
        Sale::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'unit_price' => $product->unit_price, // Store raw unit price without formatting
            'total_price' => $totalPrice,         // Store raw total price without formatting
            'sale_date' => $request->sale_date,
            'store_id' => $request->store_id,
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale recorded successfully.');
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
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'sale_date' => 'required|date',
            'store_id' => 'required|exists:stores,id',
        ]);

        // Fetch the selected product's unit price from the database
        $product = Product::find($validatedData['product_id']);
        $unitPrice = $product->unit_price;

        // Calculate the total price based on the unit price and quantity
        $totalPrice = $unitPrice * $validatedData['quantity'];

        // Update sale data
        $sale->update([
            'product_id' => $validatedData['product_id'],
            'quantity' => $validatedData['quantity'],
            'unit_price' => $unitPrice,
            'total_price' => $totalPrice,
            'sale_date' => $validatedData['sale_date'],
            'store_id' => $validatedData['store_id'],
        ]);

        return redirect()->route('sales.index')->with('success', 'Sale updated successfully!');
    }


    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()->route('sales.index')
                        ->with('success', 'Sale deleted successfully.');
    }
}
