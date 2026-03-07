<?php

namespace App\Actions\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use App\DTOs\Post\UpdatePostData;

class UpdatePostAction
{
    public function execute(UpdatePostData $data, Post $post): Post
    {
        return DB::transaction(function () use($data, $post) {

            $post->update([
                'title'       => $data->title,
                'description' => $data->description,
                'content'     => $data->content,
                'category_id' => $data->categoryId, // เรียกชื่อ property ให้ตรงกับ DTO
            ]);

            if($data->tagIds !== null){
                $post->tags()->sync($data->tagIds); // ใช้ sync แทน attach เพื่อให้แน่ใจว่า tag ที่ไม่ได้อยู่ใน $data->tagIds จะถูกลบออกจาก post ด้วย
            }

            return $post;

        });

    }
}
