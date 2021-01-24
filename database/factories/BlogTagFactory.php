<?php

namespace Database\Factories;

use App\Models\BlogTag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->word;
        $date = $this->faker->dateTimeBetween('-2 years', '-1 month');

        return [
            'title'       => $title,
            'slug'        => Str::slug($title) . '_' . random_int(0, 10),
            'description' => $this->faker->sentence(rand(3, 8), true),
            'created_at'  => $date,
            'updated_at'  => $date,
        ];
    }
}
