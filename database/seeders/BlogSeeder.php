<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ใช้ Transaction เพื่อป้องกัน Data พังกรณีรัน Seeder ไม่จบ
        DB::transaction(function () {

            // 1. สร้าง Pool ของ Data (หมวดหมู่ 10 อัน และ แท็ก 50 อัน)
            $categories = Category::factory(10)->create();
            $tags = Tag::factory(50)->create();

            // 2. สร้างบทความ 1,000 โพสต์ (สามารถเปลี่ยนเป็น 100,000 ได้ถ้าจำเป็น)
            // ใช้ chunk เพื่อป้องกัน Memory Limit หากต้องการตัวเลขเยอะมาก
            $chunkSize = 500;
            $totalPosts = 1000;

            for ($i = 0; $i < $totalPosts; $i += $chunkSize) {
                // ใช้ recycle() เพื่อให้ Post ที่ถูกสร้าง สุ่มใช้ Category จาก $categories
                $posts = Post::factory($chunkSize)
                    ->recycle($categories)
                    ->create();

                // 3. จัดการผูก M:N Relationship (Tags)
                foreach ($posts as $post) {
                    // สุ่ม Tag 2 ถึง 5 อัน ต่อ 1 บทความ
                    // เราดึงเฉพาะ ID เพื่อลดขนาด Memory ของ Collection
                    $randomTagIds = $tags->random(rand(2, 5))->pluck('id')->toArray();

                    $post->tags()->attach($randomTagIds);
                }
            }
        });
    }
}
