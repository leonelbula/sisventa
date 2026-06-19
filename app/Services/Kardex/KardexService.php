<?php

namespace App\Services\Kardex;

use App\Models\Kardex;
use App\Models\Product;
use App\DTOs\Kardex\KardexDTO;
use App\Actions\Kardex\CreateKardexAction;
use App\Repositories\Contracts\KardexRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class KardexService
{
    public function __construct(
        private KardexRepositoryInterface $repository,
        private CreateKardexAction $createAction
    ) {}

    public function getAll(array $filters)
    {
        return $this->repository
            ->getAll($filters);
    }

    public function create(KardexDTO $dto): Kardex
    {

        return $this->createAction
            ->execute($dto);
    }

    public function createInitialMovement(Product $product): void
    {

        $dto = new KardexDTO(

            product_id: $product->id,
            type: Kardex::INITIAL,
            reference: 'INVENTARIO',
            user: Auth::user()->name,
            quantity: $product->stock,
            stock_before: 0,
            stock_after: $product->stock,
            unit_cost: $product->cost_price,
            total_cost: $product->stock
                * $product->cost_price,
            observation: 'Stock inicial del producto.'
        );

        $this->create($dto);
    }
    public function createAdjustmentMovement(
        Product $product,
        int $quantity,
        int $stockBefore,
        int $stockAfter,
        ?string $observation = null
    ): void {

        $dto = new KardexDTO(
            product_id: $product->id,
            type: Kardex::ADJUSTMENT,
            reference: 'INVENTARIO',
            user: Auth::user()->name,
            quantity: $quantity,
            stock_before: $stockBefore,
            stock_after: $stockAfter,
            unit_cost: $product->cost_price,
            total_cost: $quantity *
                $product->cost_price,
            observation: $observation
        );

        $this->create($dto);
    }
}
