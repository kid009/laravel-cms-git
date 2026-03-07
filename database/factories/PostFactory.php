<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
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
            // Fallback: ถ้าตอน Create ไม่ได้ส่ง Category เข้ามาหรือไม่ได้ recycle() ให้สร้างใหม่
            'category_id' => Category::factory(),
            'title' => fake()->sentence(),
            // ใช้ text() แบบกำหนดตัวอักษรเพื่อไม่ให้ล้น Layout ของ Card เวลาแสดงผล
            'description' => fake()->text(150),
            // สร้างเนื้อหาบทความแบบยาวๆ สมจริง (HTML-ready)
            'content' => fake()->paragraphs(rand(3, 8), true),
        ];
    }
}
