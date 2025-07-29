<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(3, true),
            'thumbnail' => $this->faker->imageUrl(640, 480, 'nature', true),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? "",
            'user_id' => 1,
            'is_published' => true,
            'published_at' => fake()->optional()->dateTime(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
