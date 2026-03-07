<?php

namespace App\Actions\Category;

use App\Models\Category;
use Exception;

class DeleteCategoryAction
{
    public function execute(Category $category): bool
    {
        // ใช้ exists() จะไวกว่า count() > 0 ในระดับ Database Query
        if ($category->posts()->exists()) {
            // โยน Exception ออกไปให้ Controller จัดการ
            throw new Exception('Category cannot be deleted because it has associated posts.');
        }

        return $category->delete();
    }
}
