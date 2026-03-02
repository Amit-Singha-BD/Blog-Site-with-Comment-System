<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchValidate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array {
        return [
            "search" => "required|string|max:50",
        ];
    }

    public function messages(): array {
        return [
            "search.required" => "Please enter a search keyword.",
            "search.string"   => "The search keyword must be a valid string.",
            "search.max"      => "The search keyword may not exceed 50 characters.",
        ];
    }
}
