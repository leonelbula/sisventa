<?php

namespace App\DTOs;

class KardexDTO
{
    public function __construct(
        public int $product_id,
        public string $type,
        public int $quantity,
        public int $stock_before,
        public int $stock_after,
        public float $unit_cost,
        public float $total_cost,
        public ?string $reference = null,
        public ?string $observation = null,
        public string $user
    ) {}

    public function toArray(): array
    {
        return [
            'product_id' => $this->product_id,
            'movement_date' => now(),
            'type' => $this->type,
            'reference' => $this->reference,
            'user'=> $this->user,
            'quantity' => $this->quantity,
            'stock_before' => $this->stock_before,
            'stock_after' => $this->stock_after,
            'unit_cost' => $this->unit_cost,
            'total_cost' => $this->total_cost,
            'observation' => $this->observation,
        ];
    }
}
