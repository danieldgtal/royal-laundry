<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LaundryItem>
 */
class LaundryItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { 
      $categories = ['Electronics', 'Clothing', 'Home & Garden', 'Beauty & Health', 'Toys & Games'];
      $randomCategory = $this->faker->randomElement($categories);
        return [
          'item_name' => $this->faker->unique()->sentence(2),
          'item_category' => $randomCategory,
          'package_unit' => $this->faker->randomDigitNot(0),
          'item_price' => $this->faker->randomFloat(2,10,1000),
          'created_at' => now(),
          'updated_at' => now(),
        ];
    }
}
