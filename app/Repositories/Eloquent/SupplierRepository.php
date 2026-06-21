<?php

namespace App\Repositories\Eloquent;

use App\Models\Supplier;
use App\Repositories\Contracts\SupplierRepositoryInterface;

class SupplierRepository implements SupplierRepositoryInterface
{
    public function All(array $filters)
    {
        $query = Supplier::query();

        if (!empty($filters['search'])) {

            $search = $filters['search'];

            $query->where(function ($q) use ($search) {

                $q->where(
                    'name',
                    'like',
                    "%{$search}%"
                )
                    ->orWhere(
                        'company_name',
                        'like',
                        "%{$search}%"
                    )
                    ->orWhere(
                        'document_number',
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
            ->paginate(15)
            ->withQueryString();
    }

    public function getForSelect()
    {
        return Supplier::active()
            ->orderBy('name')
            ->get();
    }

    public function create(array $data): Supplier
    {
        return Supplier::create($data);
    }

    public function update(Supplier $supplier, array $data): bool
    {
        return $supplier->update($data);
    }

    public function delete(Supplier $supplier): bool
    {
        return $supplier->delete();
    }
}
