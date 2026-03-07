<?php

namespace App\DTOs\Category;

final readonly class CreateCategoryData
{
    public function __construct(
        public string $name,
        public int $userId,
    ) {}
}
