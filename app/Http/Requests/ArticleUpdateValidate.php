<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleUpdateValidate extends FormRequest {

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        $articleId = $this->route('articleId');

        return [
            'title'        => 'required|string|max:255',
            'category_id'  => 'required|exists:categories,id',
            'slug'         => 'required|string|max:255|unique:articles,slug,' . $articleId,
            'image'        => $this->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048' : 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'status'       => 'required|in:draft,published,pending',
            'published_at' => 'nullable|date',
            'tags'         => 'nullable|string|max:255',
            'content'      => 'required|string',
        ];
    }

    public function messages(): array {
        return [
            'title.required'       => 'Article title is required.',
            'title.max'            => 'Article title cannot exceed 255 characters.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists'   => 'Selected category does not exist.',
            'slug.required'        => 'Slug is required.',
            'slug.unique'          => 'This slug has already been taken.',
            'slug.max'             => 'Slug cannot exceed 255 characters.',
            'image.required'       => 'Please upload a featured image.',
            'image.image'          => 'The file must be an image.',
            'image.mimes'          => 'Allowed image types: jpeg, png, jpg, gif, webp.',
            'image.max'            => 'Maximum image size is 2MB.',
            'status.required'      => 'Please select a status.',
            'status.in'            => 'Invalid status selected.',
            'published_at.date'    => 'Published date must be a valid date.',
            'tags.max'             => 'Tags cannot exceed 255 characters.',
            'content.required'     => 'Article content is required.',
        ];
    }
}
