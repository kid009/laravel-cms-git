<?php

namespace App\DTOs\Category;

final readonly class UpdateCategoryData
{
    public function __construct(
        public string $name,
    ) {}
}
