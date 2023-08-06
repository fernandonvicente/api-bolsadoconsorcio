<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateRoleUser extends FormRequest
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
            'role_id' => 'required',
            'user_id' => 'required',
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $rules['role_id'] = [
                'required',
            ];

            $rules['user_id'] = [
                'required',
            ];
        }

        return $rules;
    }
}
