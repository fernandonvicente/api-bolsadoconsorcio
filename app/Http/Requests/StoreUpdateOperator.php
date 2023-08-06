<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateOperator extends FormRequest
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
            'nome' => 'required|min:3|max:255|unique:operadoras',//não deixa duplicar nome na tabela (unique:operadoras)
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $rules['nome'] = [
                'required', // 'nullable',
                'min:3',
                'max:255',
                // "unique:supports,subject,{$this->id},id",
                Rule::unique('operadoras')->ignore($this->operator ?? $this->id),
            ];
        }

        return $rules;
    }
}
