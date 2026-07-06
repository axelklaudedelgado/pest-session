<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;

    public function definition(): array
    {
        return [
            'title'        => fake()->sentence(),
            'body'         => fake()->paragraph(),
            'is_published' => false,
        ];
    }
}
