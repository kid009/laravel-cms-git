<?php

namespace App\DTOs\Post;


final readonly class CreatePostData
{
    public function __construct(
        public int $categoryId,
        public int $userId,
        public string $title,
        public string $description,
        public string $content,
        public ?array $tagIds = []  // กล่องใส่ ID ของ Tag (ใส่ ? แปลว่าเป็น null ได้ หรือส่ง array ว่างมาก็ได้)
    ) {}
}
