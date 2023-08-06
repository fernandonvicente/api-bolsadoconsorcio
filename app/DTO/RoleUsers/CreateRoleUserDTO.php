<?php

namespace App\DTO\RoleUsers;

use App\Http\Requests\StoreUpdateRoleUser;

class CreateRoleUserDTO
{
    public function __construct(
        public string $role_id,
        public string $user_id,
    ) {}

    public static function makeFromRequest(StoreUpdateRoleUser $request): self
    {
        return new self(
            $request->role_id,
            $request->user_id,
        );
    }
}
