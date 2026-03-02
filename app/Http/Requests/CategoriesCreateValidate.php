<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesCreateValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        return [
            "name"        => "required|string|min:5|max:50",
            "slug"        => "required|string|unique:categories,categories_slug|min:5|max:250",
            "description" => "required|string|min:30|max:250",
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Category name is required.',
            'name.string'   => 'Category name must be a valid string.',
            'name.min'      => 'Category name must be at least 5 characters.',
            'name.max'      => 'Category name must not exceed 50 characters.',

            'slug.required' => 'Slug is required.',
            'slug.string'   => 'Slug must be a valid string.',
            'slug.unique'   => 'This slug already exists. Please choose a different one.',
            'slug.min'      => 'Slug must be at least 5 characters.',
            'slug.max'      => 'Slug must not exceed 250 characters.',

            'description.required' => 'Description is required.',
            'description.string'   => 'Description must be a valid string.',
            'description.min'      => 'Description must be at least 30 characters.',
            'description.max'      => 'Description must not exceed 250 characters.',
        ];
    }
}
