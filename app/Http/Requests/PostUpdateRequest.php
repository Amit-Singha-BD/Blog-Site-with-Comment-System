<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'post_title'       => 'bail|required|string|min:10|max:255',
            'image_path'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'categories'       => 'bail|required|integer|exists:categories,id',
            'status'           => 'bail|required|in:Published,Pending,Rejected,Draft',
            'slug'             => 'bail|required|string|min:10|max:255|unique:posts,slug,' . $this->route('id'),
            'description'      => 'bail|required|string',
            'meta_title'       => 'nullable|string|min:10|max:255',
            'meta_description' => 'nullable|string',
        ];
    }

    public function messages(): array{
        return [
            'post_title.required'        => 'The post title is required.',
            'post_title.string'          => 'The post title must be a valid string.',
            'post_title.min'             => 'The post title must be at least 10 characters.',
            'post_title.max'             => 'The post title must not exceed 255 characters.',

            'image_path.image'           => 'The uploaded file must be an image.',
            'image_path.mimes'           => 'Allowed image types are: jpg, jpeg, png, webp.',
            'image_path.max'             => 'The image size must not exceed 2MB.',

            'categories.required'        => 'Please select a category.',
            'categories.integer'         => 'The category ID must be an integer.',
            'categories.exists'          => 'The selected category is invalid.',

            'status.required'            => 'The post status is required.',
            'status.in'                  => 'Status must be one of: Published, Pending, Rejected, or Draft.',

            'slug.required'              => 'The slug is required.',
            'slug.string'                => 'The slug must be a valid string.',
            'slug.min'                   => 'The slug must be at least 10 characters.',
            'slug.max'                   => 'The slug must not exceed 255 characters.',
            'slug.unique'                => 'The slug must be unique.',

            'description.required'       => 'The post description is required.',
            'description.string'         => 'The post description must be valid text.',

            'meta_title.string'          => 'The meta title must be a valid string.',
            'meta_title.min'             => 'The meta title must be at least 10 characters.',
            'meta_title.max'             => 'The meta title must not exceed 255 characters.',

            'meta_description.string'    => 'The meta description must be a valid string.',
        ];
    }
}