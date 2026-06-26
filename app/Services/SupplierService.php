<?php

namespace App\Services;

use Throwable;
use App\Models\Supplier;
use App\DTOs\SupplierDTO;
use Illuminate\Support\Facades\DB;
use App\Actions\Supplier\CreateSupplierAction;
use App\Actions\Supplier\DeleteSupplierAction;
use App\Actions\Supplier\UpdateSupplierAction;
use App\Repositories\Contracts\SupplierRepositoryInterface;

class SupplierService
{
    public function __construct(
        private SupplierRepositoryInterface $repository,
        private CreateSupplierAction $createAction,
        private UpdateSupplierAction $updateAction,
        private DeleteSupplierAction $deleteAction
    ) {}

    public function getAll(array $filters)
    {
        return $this->repository->All($filters);
    }

    public function getForSelect()
    {
        return $this->repository
            ->getForSelect();
    }

    public function create(SupplierDTO $dto): Supplier
    {

        DB::beginTransaction();

        try {

            $supplier = $this
                ->createAction
                ->execute($dto);

            DB::commit();

            return $supplier;
        } catch (Throwable $e) {

            DB::rollBack();

            throw $e;
        }
    }

    public function update(Supplier $supplier, SupplierDTO $dto): Supplier
    {

        DB::beginTransaction();

        try {

            $supplier = $this
                ->updateAction
                ->execute(
                    $supplier,
                    $dto
                );

            DB::commit();

            return $supplier;
        } catch (Throwable $e) {

            DB::rollBack();

            throw $e;
        }
    }

    public function delete(
        Supplier $supplier
    ): bool {

        DB::beginTransaction();

        try {

            $deleted = $this
                ->deleteAction
                ->execute($supplier);

            DB::commit();

            return $deleted;
        } catch (Throwable $e) {

            DB::rollBack();

            throw $e;
        }
    }
}
