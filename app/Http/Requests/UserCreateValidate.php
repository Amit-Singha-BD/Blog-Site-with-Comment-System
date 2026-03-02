<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateValidate extends FormRequest
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
            "name"     => "required|string|min:4|max:50",
            "email"    => "required|email|unique:users,email",
            "phone"    => "required|regex:/^01[3-9][0-9]{8}$/|unique:users,phone",
            "role"     => "required|in:SuperAdmin,Admin,Editor,User",
            "gender"   => "required|in:Male,Female,Other",
            "image"    => "nullable|image|mimes:jpg,jpeg,png,webp|max:2048",
            "password" => "required|string|min:8|max:20|confirmed",
        ];
    }

    public function messages(): array{
        return [
            "name.required"      => "Enter your name.",
            "name.string"        => "Name must be a valid string.",
            "name.min"           => "Name must be at least 4 characters.",
            "name.max"           => "Name cannot be more than 50 characters.",

            "email.required"     => "Enter your email address.",
            "email.email"        => "Enter a valid email address.",
            "email.unique"       => "This email is already registered.",

            "phone.required"     => "Enter your phone number.",
            "phone.regex"        => "Phone number must be 11 digits and start with 01 (e.g. 01XXXXXXXXXX).",
            "phone.unique"       => "This phone number is already registered.",

            "role.required"      => "Please select the role.",
            "role.in"            => "The selected role is not valid.",

            "gender.required"    => "Please select the gender.",
            "gender.in"          => "The selected gender is not valid.",

            "image.image"        => "The uploaded file must be an image.",
            "image.mimes"        => "Allowed image types are: jpg, jpeg, png, webp.",
            "image.max"          => "The image size must not exceed 2MB.",

            "password.required"  => "Enter a password.",
            "password.string"    => "Password must be a valid string.",
            "password.min"       => "Password must be at least 8 characters.",
            "password.max"       => "Password cannot be more than 20 characters.",
            "password.confirmed" => "Password confirmation does not match.",
        ];
    }
}
