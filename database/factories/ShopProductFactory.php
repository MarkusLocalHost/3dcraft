<?php

namespace Database\Factories;

use App\Models\ShopProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id'  => rand(3, 7),
            'product_name' => $this->faker->sentence(rand(2, 4), true),
            'content'      => $this->faker->realText(rand(100, 190)),
            'status'       => rand(1, 5) > 1,
            'keywords'     => $this->faker->sentence(rand(1, 5)),
            'description'  => $this->faker->realText(rand(100, 190)),
            'price'        => rand(500, 8000),
            'image'        => 'images/2020-11-14/blog-ready-' . rand(1, 10) . '.jpg',
            'hit'          => rand(1, 5) < 2,
            'created_at'   => $created_at = $this->faker->dateTimeBetween('-2 years', '-2 months'),
            'updated_at'   => $created_at = $this->faker->dateTimeBetween('-2 years', '-2 months'),
        ];
    }
}
