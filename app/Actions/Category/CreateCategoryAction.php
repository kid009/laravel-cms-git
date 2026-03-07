<?php

namespace App\Actions\Category;

use App\DTOs\CategoryData;
use App\Models\Category;

class CreateCategoryAction
{
    public function execute(CategoryData $data): Category
    {
        return Category::create([
            'name' => $data->name,
        ]);
    }
}
