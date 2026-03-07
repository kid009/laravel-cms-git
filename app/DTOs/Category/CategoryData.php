<?php

namespace App\DTOs;

final readonly class CategoryData
{
    public function __construct(
        public string $name,
    ) {}
}
