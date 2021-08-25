<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this -> faker-> name(),
            'cost' => random_int(1000,100000),
            'price' => random_int(2000,200000),
            'quantity' => random_int(1,50),
            'brand_id' => random_int(1,10),
            'category_id' => random_int(1,10)
        ];
    }
}
