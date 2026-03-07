<?php
namespace App\Actions\Category;

use App\DTOs\Category\UpdateCategoryData;
use App\Models\Category;

class UpdateCategoryAction
{
    public function execute(Category $category, UpdateCategoryData $data): bool
    {
        return $category->update([
            'name' => $data->name,
        ]);
    }
}
