<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::create([
            'name' => 'Town Shop',
            'location' => 'Town Center'
        ]);

        Store::create([
            'name' => 'Village Shop',
            'location' => 'Village Square'
        ]);
    }
}
