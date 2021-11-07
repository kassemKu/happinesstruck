<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_en_name = $this->faker->unique()->words($nb = 2, $asText = true);
        $category_ar_name = $this->faker->unique()->words($nb = 2, $asText = true);
        $slug = Str::slug($category_en_name);

        return [
            'ar_name' =>  $category_ar_name,
            'en_name' =>  $category_en_name,
            'ar_slug' => $slug,
            'en_slug' => $slug,
        ];
    }
}
