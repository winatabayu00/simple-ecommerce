<?php

namespace Database\Seeders;

use App\Actions\Product\CreateProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $price = range(100000, 10000000, 1000000);
        $products = [
            [
                'name' => 'product 1',
                'description' => fake()->text(1000),
                'price' => $price[rand(1, count($price) - 1)],
                'stock' => rand(10, 100),
            ],
            [
                'name' => 'product 2',
                'description' => fake()->text(1000),
                'price' => $price[rand(1, count($price) - 1)],
                'stock' => rand(10, 100),
            ],
            [
                'name' => 'product 3',
                'description' => fake()->text(1000),
                'price' => $price[rand(1, count($price) - 1)],
                'stock' => rand(10, 100),
            ],
            [
                'name' => 'product 4',
                'description' => fake()->text(1000),
                'price' => $price[rand(1, count($price) - 1)],
                'stock' => rand(10, 100),
            ],
            [
                'name' => 'product 5',
                'description' => fake()->text(1000),
                'price' => $price[rand(1, count($price) - 1)],
                'stock' => rand(10, 100),
            ],
        ];

        foreach ($products as $product) {
            (new CreateProduct($product))->execute();
        }
    }
}
