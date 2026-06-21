<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'document_type' => [
                'required',
                'string',
                'max:20',
            ],

            'document_number' => [
                'required',
                'string',
                'max:50',
                Rule::unique(
                    'suppliers',
                    'document_number'
                )->ignore(
                    $this->supplier
                ),
            ],

            'name' => [
                'required',
                'string',
                'max:150',
            ],

            'company_name' => [
                'nullable',
                'string',
                'max:150',
            ],

            'phone' => [
                'nullable',
                'string',
                'max:50',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'address' => [
                'nullable',
                'string',
                'max:255',
            ],

            'status' => [
                'required',
                'boolean',
            ],

            'observation' => [
                'nullable',
                'string',
            ],
        ];
    }
}
