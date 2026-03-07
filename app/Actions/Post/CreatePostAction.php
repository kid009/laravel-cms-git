<?php

namespace App\Actions\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\DTOs\Post\CreatePostData;

class CreatePostAction
{
    public function execute(CreatePostData $data): Post
    {
        return DB::transaction(function () use($data) {

            $post = Post::create([
                'title'       => $data->title,
                'description' => $data->description,
                'content'     => $data->content,
                'category_id' => $data->categoryId, // เรียกชื่อ property ให้ตรงกับ DTO
                'user_id'     => $data->userId,
            ]);

            if(!empty($data->tagIds)){
                $post->tags()->sync($data->tagIds); // ใช้ sync แทน attach เพื่อให้แน่ใจว่า tag ที่ไม่ได้อยู่ใน $data->tagIds จะถูกลบออกจาก post ด้วย
            }

            return $post;

        });

    }
}
