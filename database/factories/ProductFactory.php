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
        $product_en_name = $this->faker->unique()->words($nb = 2, $asText = true);
        $product_ar_name = $this->faker->unique()->words($nb = 2, $asText = true);
        $slug = Str::slug($product_en_name);

        return [
            'ar_name'     => $product_ar_name,
            'en_name' => $product_en_name,
            'slug' => $slug,
            'ar_short_description' => $this->faker->text(200),
            'ar_description' => $this->faker->text(200),
            'en_short_description' => $this->faker->text(200),
            'en_description' => $this->faker->text(200),
            'price' => $this->faker->numberBetween(1, 200),
            'SKU' => 'DIGI' . $this->faker->numberBetween(100, 500),
            'stock_status' => 'in_stock',
            'quantity' => $this->faker->numberBetween(10, 500),
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
