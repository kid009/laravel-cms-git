<?php
namespace App\Actions\Category;

use App\DTOs\CategoryData;
use App\Models\Category;

class UpdateCategoryAction
{
    public function execute(Category $category, CategoryData $data): bool
    {
        return $category->update([
            'name' => $data->name,
        ]);
    }
}
