<?php

namespace Database\Factories;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->realTextBetween(20,65),
            'body' => $this->faker->realTextBetween(500,3500),
            'created_at' => $this->faker->dateTimeBetween('-5 months'),
            'updated_at' => $this->faker->dateTimeBetween('-2 months'),
        ];
    }
}
