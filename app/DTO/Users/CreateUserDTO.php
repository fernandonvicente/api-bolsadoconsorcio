<?php

namespace App\DTO\Users;

use App\Http\Requests\StoreUpdateUser;
use Illuminate\Support\Facades\Hash;

class CreateUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {}

    public static function makeFromRequest(StoreUpdateUser $request): self
    {
        return new self(
            $request->name,
            $request->email,
            Hash::make($request->password),
        );
    }
}
