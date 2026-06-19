<?php
namespace App\DTOs\Category;

class CategoryDTO
{
    public function __construct(
        public string $name,
        public ?string $description,
        public bool $status,
    ) {
    }
    
}