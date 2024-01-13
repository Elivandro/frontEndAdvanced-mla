<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'name' => fake('pt_BR')->firstName(),
            'short_description' => fake('pt_BR')->text(25),
            'long_description' => fake('pt_BR')->text(255),
            'price' => fake()->randomNumber(4),
            'comparative_price' => fake()->randomNumber(5),
        ];
    }
}
