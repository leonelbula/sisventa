<?php
namespace App\Repositories\Contracts;

use App\Models\Kardex;

interface KardexRepositoryInterface
{
    public function getAll(array $fillers);
    public function create(array $data): Kardex;
}