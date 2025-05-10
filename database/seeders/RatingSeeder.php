<?php

namespace Database\Seeders;

use App\Actions\Product\CreateProduct;
use App\Models\Product;
use App\Models\User;
use App\Services\ShoppingService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $products = Product::query()
           ->get();

       $user = User::query()->where('role', '=', 'user')
           ->first();

       $service = new ShoppingService();
       foreach ($products as $product) {
           for ($i = 1; $i <= rand(20, 50); $i++) {
               $dataRating = [
                   'product_id' => $product->id,
                   'rating' => rand(1, 5),
                   'comment' => fake()->text(100),
               ];
               $service->giveRating($user, $dataRating);
           }
       }
    }
}
