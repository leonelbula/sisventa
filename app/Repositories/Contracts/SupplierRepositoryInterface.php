<?php
namespace App\Repositories\Contracts;

use App\Models\Supplier;

interface SupplierRepositoryInterface
{
    public function All(array $filters);

    public function getForSelect();

    public function create(array $data): Supplier;

    public function update( Supplier $supplier, array $data ): bool;

    public function delete(Supplier $supplier): bool;
}
