<?php

namespace App\Actions\Supplier;

use App\Models\Supplier;
use App\DTOs\Supplier\SupplierDTO;

class CreateSupplierAction
{
    public function execute(SupplierDTO $dto): Supplier
    {

        return Supplier::create($dto->toArray());
    }
}
