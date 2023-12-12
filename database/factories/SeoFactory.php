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
            'title' => $this->faker->title,
            'description' => $this->faker->paragraph,
            'type' => $type[rand(0,count($type) - 1)],
            'image' => 'not-found.png'
        ];
    }
}
