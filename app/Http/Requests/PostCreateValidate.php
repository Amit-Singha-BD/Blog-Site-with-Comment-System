<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateValidate extends FormRequest
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
    public function rules(): array
    {
        return [
            'post_title'       => 'required|string|min:10|max:255',
            'image_path'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'categories'       => 'required|integer|exists:categories,id',
            'status'           => 'in:Published,Pending,Rejected,Draft',
            'slug'             => 'required|string|unique:posts,slug|min:10|max:255',
            'description'      => 'required|string|min:50',
            'meta_title'       => 'nullable|string|min:10|max:255',
            'meta_description' => 'nullable|string|min:50|max:500',
        ];
    }

    public function messages(): array{
        return [
            'post_title.required'        => 'Please enter a post title.',
            'post_title.string'          => 'The post title must be a valid string.',
            'post_title.min'             => 'The post title must be at least 10 characters.',
            'post_title.max'             => 'The post title may not exceed 255 characters.',

            'image_path.image'           => 'The uploaded file must be an image.',
            'image_path.mimes'           => 'Allowed image types are: jpg, jpeg, png, webp.',
            'image_path.max'             => 'The image size must not exceed 2MB.',

            'categories.required'        => 'Please select a category.',
            'categories.integer'         => 'The selected category is invalid.',
            'categories.exists'          => 'The selected category does not exist in our records.',

            'status.in'                  => 'The selected status is not valid.',

            'slug.required'              => 'A unique slug is required for the post.',
            'slug.string'                => 'The slug must be a valid string.',
            'slug.unique'                => 'This slug is already in use. Please choose a different one.',
            'slug.min'                   => 'The slug must be at least 10 characters.',
            'slug.max'                   => 'The slug may not exceed 255 characters.',

            'description.required'       => 'Please provide a detailed post description.',
            'description.string'         => 'The description must be valid text.',
            'description.min'            => 'The description must be at least 50 characters long.',

            'meta_title.string'          => 'The meta title must be valid text.',
            'meta_title.min'             => 'The meta title must be at least 10 characters.',
            'meta_title.max'             => 'The meta title may not exceed 255 characters.',

            'meta_description.string'    => 'The meta description must be valid text.',
            'meta_description.min'       => 'The meta description must be at least 50 characters.',
            'meta_description.max'       => 'The meta description may not exceed 500 characters.',
        ];
    }
}
