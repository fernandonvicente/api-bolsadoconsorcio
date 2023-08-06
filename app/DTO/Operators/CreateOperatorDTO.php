<?php

namespace App\DTO\Operators;

use App\Http\Requests\StoreUpdateOperator;

class CreateOperatorDTO
{
    public function __construct(
        public string $nome,
    ) {}

    public static function makeFromRequest(StoreUpdateOperator $request): self
    {
        return new self(
            $request->nome,
        );
    }
}
