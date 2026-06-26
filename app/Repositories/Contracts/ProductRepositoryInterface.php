<?php
namespace App\Repositories\Contracts;

use App\Models\Product;
use App\DTOs\ProductDTO;

interface ProductRepositoryInterface
{
    public function getAll(array $filters = []);
    public function getById(int $id): ?Product;
    public function create(ProductDTO $productDTO): Product;
    public function update(Product $product, ProductDTO $productDTO): bool;
    public function delete(Product $product): bool;
}