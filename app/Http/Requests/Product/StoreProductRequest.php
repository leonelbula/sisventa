<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',           
            'barcode.required' => 'El código de barras es obligatorio.',
            'category_id.required' => 'La categoría es obligatoria.',
            'cost_price.required' => 'El precio de costo es obligatorio.',
            'sale_price.required' => 'El precio de venta es obligatorio.',
            'stock.required' => 'El stock es obligatorio.',
            'min_stock.required' => 'El stock mínimo es obligatorio.',
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'status' => $this->has('status') ? true : false,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',           
            'barcode' => 'required|string|unique:products,barcode|max:255',
            'category_id' => 'required|exists:categories,id',
            'cost_price' => 'required|numeric|min:0',
            'sale_price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'utlilty'=> 'integer',
            'min_stock' => 'required|integer|min:0',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre',
            'barcode' => 'código de barras',
            'category_id' => 'categoría',
            'cost_price' => 'precio de costo',
            'sale_price' => 'precio de venta',
            'utility' => 'Utilidad',
            'stock' => 'stock',
            'min_stock' => 'stock mínimo',
        ];
    }
}
