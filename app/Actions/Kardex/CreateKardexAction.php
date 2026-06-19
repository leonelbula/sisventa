<?php

namespace App\Actions\Kardex;

use App\DTOs\Kardex\KardexDTO;
use App\Models\Kardex;


class CreateKardexAction
{
    public function execute(KardexDTO $dto ): Kardex {

        return Kardex::create(
            $dto->toArray()
        );
    }
}
