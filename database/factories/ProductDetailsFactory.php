<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductDetails>
 */
class ProductDetailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    
    {
        $faker=$this->faker;
        return [
            'img1' => $faker->imageUrl(),
            'img2' => $faker->imageUrl(),
            'img3' => $faker->imageUrl(),
            'img4' => $faker->imageUrl(),
            'des' => $faker->paragraph,
            'color' => $faker->colorName,
            'size' => $faker->randomElement(['S', 'M', 'L', 'XL']),
            'product_id' => $faker->numberBetween(1, 50), // Assuming you have 50 products.
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
