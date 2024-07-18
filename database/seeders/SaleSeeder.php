<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Store;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = Product::first();
        $product2 = Product::skip(1)->first();
        $store1 = Store::first();
        $store2 = Store::skip(1)->first();

        Sale::create([
            'product_id' => $product1->id,
            'quantity' => 5,
            'total_price' => $product1->price * 5,
            'sale_date' => now(),
            'store_id' => $store1->id
        ]);

        Sale::create([
            'product_id' => $product2->id,
            'quantity' => 3,
            'total_price' => $product2->price * 3,
            'sale_date' => now(),
            'store_id' => $store2->id
        ]);
    }
}
