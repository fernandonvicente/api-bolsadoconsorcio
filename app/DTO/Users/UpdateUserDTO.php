<?php

namespace App\DTO\Users;

use App\Http\Requests\StoreUpdateUser;
use Illuminate\Support\Facades\Hash;

class UpdateUserDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $email,
        public string $password,
    ) {}

    public static function makeFromRequest(StoreUpdateUser $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->name,
            $request->email,
            Hash::make($request->password),
        );
    }
}
