<?php

namespace App\Services\Product;

use Exception;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\DTOs\Product\ProductDTO;
use App\Actions\Product\CreateProductAction;
use App\Actions\Product\UpdateProductAction;
use App\Actions\Product\DeleteProductAction;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductService
{
    public function __construct(
        private CreateProductAction $createProductAction,
        private UpdateProductAction $updateProductAction,
        private DeleteProductAction $deleteProductAction,
        private readonly ProductRepositoryInterface $repository
        
    ) {}

    public function getAll(array $filters = [])
    {
        return $this->repository
            ->getAll($filters);
    }

    public function create(ProductDTO $productDTO): Product
    {
        DB::beginTransaction();
        try {
            if (empty($productDTO->sku)) {
                $productDTO->sku = $this->generateUniqueSKU();
            }
            $product = $this->createProductAction->execute($productDTO);

            DB::commit();
            return $product;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Product $product, ProductDTO $productDTO): bool
    {
        DB::beginTransaction();
        try {
            $result = $this->updateProductAction->execute($product, $productDTO);
            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete(Product $product): bool
    {
        DB::beginTransaction();
        try {
            $result = $this->deleteProductAction->execute($product);
            DB::commit();
            return $result;
        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    private function generateUniqueSKU(): string
    {
        $lastId = Product::max('id') + 1;

        return 'PRD-' . str_pad(
            $lastId,
            4,
            '0',
            STR_PAD_LEFT
        );
    }
    public function bulkDelete(
        array $ids
    ): void {

        DB::beginTransaction();

        try {

            Product::whereIn(
                'id',
                $ids
            )->delete();

            DB::commit();
        } catch (\Throwable $e) {

            DB::rollBack();

            throw $e;
        }
    }
}
