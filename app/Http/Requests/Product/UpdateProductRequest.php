<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function prepareForValidation(): void
    {
        $this->merge([
            'status' => $this->boolean('status'),
        ]);
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $product = $this->route('product');
        return [
            'name' => 'required|string|max:255',        
           
            'barcode' => 'nullable|string|max:100',
            Rule::unique('products', 'barcode')
                ->ignore($product),
            'category_id' => 'required|exists:categories,id',
            'cost_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'utlilty'=> 'integer',
            'stock' => 'required|integer|min:0',
            'min_stock' => 'required|integer|min:0',
        ];
    }
    public function messages(): array
    {
        return (new StoreProductRequest())->messages();
    }

    public function attributes(): array
    {
        return (new StoreProductRequest())->attributes();
    }
}
