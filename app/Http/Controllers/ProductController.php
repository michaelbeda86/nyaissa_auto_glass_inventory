<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Store;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('store')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $stores = Store::all();
        return view('products.create', compact('stores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'unit_price' => 'required|numeric',
            'stock' => 'required|integer',
            'store_id' => 'required|exists:stores,id',
        ]);

        // Convert unit_price to an integer (removing any decimal point)
        $requestData = $request->all();
        $requestData['unit_price'] = (int) str_replace(',', '', $requestData['unit_price']);

        Product::create($requestData);

        return redirect()->route('products.index')
                        ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $stores = Store::all();
        return view('products.edit', compact('product', 'stores'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'unit_price' => 'required|numeric',
            'stock' => 'required|integer',
            'store_id' => 'required|exists:stores,id',
        ]);

        // Convert unit_price to an integer (removing any decimal point)
        $requestData = $request->all();
        $requestData['unit_price'] = (int) str_replace(',', '', $requestData['unit_price']);

        $product->update($requestData);

        return redirect()->route('products.index')
                        ->with('success', 'Product updated successfully.');
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                        ->with('success', 'Product deleted successfully.');
    }
}
