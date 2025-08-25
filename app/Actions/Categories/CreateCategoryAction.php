<?php

namespace App\Actions\Categories;

use App\Models\Category;

class CreateCategoryAction
{
    public function execute(array $data): Category
    {
        /** @var Category $category */
        $category = Category::create($data);

        return $category;
    }
}

