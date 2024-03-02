<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeRider extends FormRequest
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
            'first_name' => 'required|max:50',
            'last_name' => 'required|max:50',
            'email' => 'required|unique:riders|email',
            'phone' => 'required|min:10|max:10|unique:riders',
            'password' => 'required',
            'age' => 'required',
        ];
    }
}
