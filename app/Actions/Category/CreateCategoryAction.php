<?php

namespace App\Actions\Category;

use App\DTOs\Category\CreateCategoryData;
use App\Models\Category;

class CreateCategoryAction
{
    public function execute(CreateCategoryData $data): Category
    {
        return Category::create([
            'name' => $data->name,
            'user_id' => $data->userId,
        ]);
    }
}
