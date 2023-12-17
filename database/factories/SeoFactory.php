<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seo>
 */
class SeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = ['article','review','product'];
        return [
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->realText,
            'type' => $type[rand(0,count($type) - 1)],
            'image' => 'asset/error-404-photo.png'
            #'image' => $this->faker->imageUrl()
        ];
    }
}
