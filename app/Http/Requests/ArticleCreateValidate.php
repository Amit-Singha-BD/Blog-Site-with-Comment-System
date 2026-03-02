<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCreateValidate extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            'title'         => 'required|string|max:255',
            'category_id'   => 'required|exists:categories,id',
            'slug'          => 'required|string|max:255|unique:articles,slug',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'published_at'  => 'nullable|date',
            'status'        => 'required|in:draft,published,pending',
            'tags'          => 'nullable|string|max:255',
            'content'       => 'required|string|min:50',
        ];
    }

    public function messages(): array {
        return [
            'title.required'         => 'Please enter the article title.',
            'category_id.required'   => 'Please select a category.',
            'slug.required'          => 'A unique slug is required for the article.',
            'slug.unique'            => 'This slug has already been taken.',
            'image.image'            => 'The uploaded file must be an image.',
            'image.mimes'            => 'Only JPG, JPEG, PNG, and WEBP formats are allowed.',
            'status.in'              => 'Invalid status selected.',
            'content.required'       => 'Article content is required.',
            'content.min'            => 'Content must be at least 50 characters long.',
        ];
    }
}
