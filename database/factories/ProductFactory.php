<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        $faker = $this->faker;

        return [
            'title'          => $faker->sentence(4),
            'short_des'      => $faker->paragraph,
            'price'          => $faker->randomFloat(2, 10, 1000), // Generates a random float between 10 and 1000 with 2 decimal places.
            'discount' => $faker->boolean,
            'discount_price' => $faker->randomFloat(2, 5, 500), // Example, adjust range as needed.
            'image'    => $faker->imageUrl(),
            'stock'          => $faker->boolean,
            'star'           => $faker->randomFloat(1, 0, 5), // Generates a random float between 0 and 5 with 1 decimal place.
            'remark'   => $faker->randomElement(['popular', 'new', 'top', 'special', 'trending', 'regular']),
            'category_id'    => $faker->numberBetween(1, 8), // Assuming you have 10 categories.
            'brand_id' => $faker->numberBetween(1, 5), // Assuming you have 5 brands.

        ];
    }
}
