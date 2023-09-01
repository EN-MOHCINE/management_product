<?php

namespace Database\Factories;

use App\Models\Product; // Import the Product model
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProductFactory extends Factory
{
    protected $model = Product::class; // Specify the model class

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'description' => $this->faker->text,
            'size' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
            'picture' => $this->faker->imageUrl(640, 480, 'product', true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
