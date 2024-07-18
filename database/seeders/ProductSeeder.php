<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Store;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store1 = Store::first();
        $store2 = Store::skip(1)->first();

        Product::create([
            'name' => 'Front Windshield',
            'description' => 'Front windshield for various car types',
            'price' => 100.00,
            'stock' => 50,
            'store_id' => $store1->id
        ]);

        Product::create([
            'name' => 'Rear Windshield',
            'description' => 'Rear windshield for various car types',
            'price' => 90.00,
            'stock' => 30,
            'store_id' => $store2->id
        ]);
    }
}
