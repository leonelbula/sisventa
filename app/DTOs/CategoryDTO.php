<?php
namespace App\DTOs;

class CategoryDTO
{
    public function __construct(
        public string $name,
        public ?string $description,
        public bool $status,
    ) {
    }
    

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status
        ];
    }
}