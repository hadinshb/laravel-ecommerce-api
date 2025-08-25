<?php

namespace App\Http\Requests\Api\V1\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|required|string|max:255|unique:categories,slug,' . $this->category->id,
        ];
    }
}
