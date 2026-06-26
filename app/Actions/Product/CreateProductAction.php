<?php

namespace App\Actions\Product;

use App\DTOs\ProductDTO;
use App\Repositories\Eloquent\ProductRepository;

class CreateProductAction
{
    public function __construct(
        private ProductRepository $repository
    ) {}

    public function execute(ProductDTO $dto)
    {        
        return $this->repository->create($dto);
    }
}