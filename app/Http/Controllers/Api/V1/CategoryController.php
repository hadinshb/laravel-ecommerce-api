<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Category\StoreCategoryRequest;
use App\Http\Requests\Api\V1\Category\UpdateCategoryRequest;
use App\Http\Resources\Api\V1\CategoryResource;
use App\Actions\Categories\CreateCategoryAction;
use App\Actions\Categories\UpdateCategoryAction;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::paginate(10));
    }

    public function store(StoreCategoryRequest $request, CreateCategoryAction $createCategoryAction)
    {
        $category = $createCategoryAction->execute($request->validated());

        return new CategoryResource($category);
    }

    public function show(Category $category, )
    {
        return new CategoryResource($category);
    }

    public function update(UpdateCategoryRequest $request, Category $category, UpdateCategoryAction $updateCategoryAction)
    {
        $updatedCategory = $updateCategoryAction->execute($category, $request->validated());

        return new CategoryResource($updatedCategory);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}
