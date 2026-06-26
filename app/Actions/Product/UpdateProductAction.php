<?php

namespace App\Actions\Product;

use App\DTOs\ProductDTO;
use App\Models\Product;
use App\Repositories\Eloquent\ProductRepository;

class UpdateProductAction
{
    public function __construct(
        private ProductRepository $repository
    ) {}

    public function execute(Product $product, ProductDTO $dto)
    {
        return $this->repository->update($product, $dto);
    }

}