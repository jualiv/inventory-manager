<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'name' => 'iPhone 15 Pro',
            'description' => 'Titanio natural, 256GB',
            'price' => 1200
        ]);

        \App\Models\Product::create([
            'name' => 'MacBook Air M3',
            'description' => '13 pulgadas, 16GB RAM',
            'price' => 1500
        ]);

        \App\Models\Product::create([
            'name' => 'tostadora',
            'description' => 'acero inox',
            'price' => 45
        ]);
    }
}
