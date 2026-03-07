<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'content' => fake()->text(1000), // จำลองเนื้อหาขนาดยาว 1000 ตัวอักษร
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory(),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
        ];
    }
}
