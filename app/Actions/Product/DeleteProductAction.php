<?php

namespace App\Actions\Product;

use App\Models\Product;
use App\Repositories\Eloquent\ProductRepository;

class DeleteProductAction
{
    public function __construct(
        private ProductRepository $repository
    ) {}

    public function execute(Product $product)
    {
        return $this->repository->delete($product);
    }
}