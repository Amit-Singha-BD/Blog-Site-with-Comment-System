<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array {
        $userId = $this->user()->id;

        return [
            "name"   => "required|string|min:4|max:50",
            "email"  => "required|email|unique:users,email,".$userId,
            "phone"  => "required|regex:/^01[3-9][0-9]{8}$/|unique:users,phone,".$userId,
            "gender" => "required|in:Male,Female,Other",
        ];
    }

    public function messages(): array {
        return [
            "name.required"      => "Please enter your name.",
            "name.string"        => "Name must be text only.",
            "name.min"           => "Name must be at least 4 characters long.",
            "name.max"           => "Name cannot exceed 50 characters.",

            "email.required"     => "Please enter your email address.",
            "email.email"        => "Please enter a valid email address.",
            "email.unique"       => "This email address is already in use.",

            "phone.required"     => "Please enter your phone number.",
            "phone.regex"        => "Phone number must be 11 digits and start with 01.",
            "phone.unique"       => "This phone number is already in use.",

            "gender.required"    => "Please select your gender.",
            "gender.in"          => "Invalid gender selection.",
        ];
    }
}