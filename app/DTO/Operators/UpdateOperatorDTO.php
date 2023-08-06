<?php

namespace App\DTO\Operators;

use App\Http\Requests\StoreUpdateOperator;

class UpdateOperatorDTO
{
    public function __construct(
        public string $id,
        public string $nome,
    ) {}

    public static function makeFromRequest(StoreUpdateOperator $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->nome,
        );
    }
}
