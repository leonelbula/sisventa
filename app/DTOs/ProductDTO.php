<?php

namespace App\DTOs;

class ProductDTO
{
    public function __construct(
        public readonly ?string $name,
        public  ?string $sku,
        public readonly ?string $barcode,
        public readonly ?int $category_id,
        public readonly ?int $cost_price,
        public readonly ?int $sale_price,
        public readonly ?int $utility,
        public readonly ?int $stock,
        public readonly ?int $min_stock,
        public readonly ?bool $status,
        public readonly ?string $description,
    ) {}

    public static function fromRequest($request): self
    {
        return new self(
            name: $request->name,
            sku: $request->sku,
            barcode: $request->barcode,
            category_id: $request->category_id,
            cost_price: $request->cost_price,
            sale_price: $request->sale_price,
            utility: $request->utility,
            stock: $request->stock,
            min_stock: $request->min_stock,
            status: $request->boolean('status'),
            description: $request->description,
        );
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'sku' => $this->sku,
            'barcode' => $this->barcode,
            'category_id' => $this->category_id,
            'cost_price' => $this->cost_price,
            'sale_price' => $this->sale_price,
            'utility'=>$this->utility,
            'stock' => $this->stock,
            'min_stock' => $this->min_stock,
            'status' => $this->status,
            'description' => $this->description,
        ];
    }
}
