<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateQuotaCanceled extends FormRequest
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
            'user_id' => 'required',
            'customer_canceled_id' => 'required',
            'administrator_id' => 'required',
            'cli_old_id' => 'nullable',
            'group' => 'required|string|min:3|max:5',
            'quota' => 'required|string|min:3|max:5',
            'contract' => 'required|unique:quota_canceleds',
            'document' => 'required|string|min:14|max:18',
            'purchase_date' => 'required|date',
            'registry' => 'nullable',
            'book' => 'nullable',
            'sheets' => 'nullable',
            'matriz' => 'required',
            'status' => 'required',
        ];

        if ($this->method() === 'PUT' || $this->method() === 'PATCH') {
            $rules['user_id'] = ['required'];
            $rules['customer_canceled_id'] = ['required'];
            $rules['administrator_id'] = ['required'];
            $rules['cli_old_id'] = ['nullable'];
            $rules['group'] = [
                'required',
                'string',
                'min:3',
                'max:5',
            ];

            $rules['quota'] = [
                'required',
                'string',
                'min:3',
                'max:5',
            ];

            $rules['contract'] = [
                'required',
                Rule::unique('quota_canceleds')->ignore($this->quotas_canceled ?? $this->id),
            ];

            $rules['document'] = [
                'required',
                'string',
                'min:14',
                'max:18',
            ];

            $rules['purchase_date'] = [
                'required',
                'date',
            ];

            $rules['registry'] = [
                'nullable',
            ];

            $rules['book'] = [
                'nullable',
            ];

            $rules['sheets'] = [
                'nullable',
            ];

            $rules['matriz'] = [
                'required',
            ];

            $rules['status'] = [
                'required',
            ];

        }

        return $rules;
    }
}
