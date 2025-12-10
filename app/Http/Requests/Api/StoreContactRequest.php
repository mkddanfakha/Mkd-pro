<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // API publique, pas besoin d'authentification
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'phone' => ['required', 'string', 'min:8', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:1000'],
            'captcha_answer' => ['required', 'numeric'],
        ];
    }
}
