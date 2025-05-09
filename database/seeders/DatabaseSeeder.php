<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Order;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(10)->create();

        Order::factory(10)->create();
    }
}
