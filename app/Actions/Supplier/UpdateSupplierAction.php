<?php

namespace App\Actions\Supplier;

use App\Models\Supplier;
use App\DTOs\SupplierDTO;

class UpdateSupplierAction
{
    public function execute(Supplier $supplier, SupplierDTO $dto): Supplier
    {

        $supplier->update($dto->toArray());

        return $supplier->fresh();
    }
}
