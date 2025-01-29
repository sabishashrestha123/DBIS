<?php

namespace App\Http\Requests\BookIssue;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookIssueRequest extends FormRequest
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
            'user_id' => ['required',Rule::exists('users','id')],
            'book_id' => ['required',Rule::exists('books','id')],
          'issue_date' => 'required|date',
          'return_date' => 'required|date',
        ];
    }
}
