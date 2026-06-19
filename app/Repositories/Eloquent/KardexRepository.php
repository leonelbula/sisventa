<?php

namespace App\Repositories\Eloquent;

use App\Models\Kardex;
use App\Repositories\Contracts\KardexRepositoryInterface;


class KardexRepository implements KardexRepositoryInterface
{
    public function getAll(array $fillers)
    {
        $query = Kardex::query()
            ->with('product');

        if (!empty($filters['search'])) {

            $search = $filters['search'];

            $query->whereHas(
                'product',
                function ($q) use ($search) {

                    $q->where(
                        'name',
                        'like',
                        "%{$search}%"
                    );
                }
            );
        }

        if (!empty($filters['type'])) {

            $query->where(
                'type',
                $filters['type']
            );
        }

        return $query
            ->latest('movement_date')
            ->paginate(15)
            ->withQueryString();
    }
    public function create(array $data): Kardex {
        return Kardex::create($data);
    }
}
