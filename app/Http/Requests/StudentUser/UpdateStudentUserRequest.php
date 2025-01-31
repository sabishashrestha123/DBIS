<?php

namespace App\Http\Requests\StudentUser;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateStudentUserRequest extends FormRequest
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
            'name' => 'nullable|string|max:255',
            'email' => 'nullavle|email|unique:users,email',
            'password' => ['nullable','confirmed',Password::min(5)->letters()],
            'Symbol_no' => 'nullable|string|max:255',
            'status' => ['nullable','boolean'],
        ];
    }
}
