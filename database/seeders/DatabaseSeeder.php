<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Database\Seeders\BlogSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. สร้าง Admin เพื่อให้เราใช้ล็อคอินทดสอบระบบ
        User::factory()->create([
            'name' => 'Admin System',
            'email' => 'admin@blog.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. สร้าง User ทั่วไปอีก 10 คน
        User::factory(10)->create();

        // 3. สร้าง Categories 5 หมวดหมู่ และ Tags 20 แท็ก
        Category::factory(5)->create();
        $tags = Tag::factory(20)->create(); // เก็บตัวแปร tags ไว้ใช้ผูกกับ Post

        // 4. สร้าง Posts 50 บทความ
        Post::factory(50)->create()->each(function ($post) use ($tags) {

            // 5. สุ่มดึง Tag มา 1 ถึง 5 อัน แล้วนำมาผูกกับ Post ที่เพิ่งสร้าง
            $randomTags = $tags->random(rand(1, 5))->pluck('id')->toArray();

            // ใช้ sync() ในการเขียนข้อมูลลงตาราง pivot (post_tag)
            $post->tags()->sync($randomTags);

        });
    }
}
