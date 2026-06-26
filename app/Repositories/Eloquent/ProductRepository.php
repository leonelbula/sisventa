<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\DTOs\ProductDTO;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(array $filters = [])
    {
        $query = Product::query()
            ->with('category');

        if (!empty($filters['search'])) {

            $search = $filters['search'];

            $query->where(function ($q) use ($search) {

                $q->where(
                    'name',
                    'like',
                    "%{$search}%"
                )
                    ->orWhere(
                        'sku',
                        'like',
                        "%{$search}%"
                    )
                    ->orWhere(
                        'barcode',
                        'like',
                        "%{$search}%"
                    );
            });
        }

        if (
            isset($filters['status'])
            && $filters['status'] !== ''
        ) {
            $query->where(
                'status',
                $filters['status']
            );
        }

        return $query
            ->latest()
            ->paginate(10)
            ->withQueryString();
    }
    public function getById(int $id): ?Product
    {
        return Product::find($id);
    }
    public function create(ProductDTO $productDTO): Product
    {
        return Product::create($productDTO->toArray());
    }
    public function update(Product $product, ProductDTO $productDTO): bool
    {
        return $product->update($productDTO->toArray());
    }
    public function delete(Product $product): bool
    {
        return $product->delete();
    }
}
