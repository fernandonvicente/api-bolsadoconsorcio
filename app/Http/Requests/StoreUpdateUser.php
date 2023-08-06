<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUser extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|min:3|max:255',//não deixa duplicar nome na tabela (unique:operadoras)
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $rules['name'] = [
                'required', // 'nullable',
                'min:3',
                'max:255',
                Rule::unique('users')->ignore($this->user ?? $this->id),
            ];
            $rules['email'] = [
                'required', // 'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user ?? $this->id),
            ];
            $rules['password'] = [
                'required', // 'nullable',
                'string',
                'min:6',
                'confirmed',
            ];
        }

        return $rules;
    }
}
