<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $productIds = Product::all()->pluck('id');
        $userIds = User::all()->pluck('id');
        return [
            'product_id' => $this->faker->randomElement($productIds),
            'user_id'    => $this->faker->randomElement($userIds),
            'rating'     => $this->faker->numberBetween(1, 5),
            'review'     => $this->faker->text(50),
        ];
    }
}
