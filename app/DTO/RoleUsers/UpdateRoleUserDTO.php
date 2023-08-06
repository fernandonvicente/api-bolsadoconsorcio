<?php

namespace App\DTO\RoleUsers;

use App\Http\Requests\StoreUpdateRoleUser;

class UpdateRoleUserDTO
{
    public function __construct(
        public string $id,
        public string $role_id,
        public string $user_id,
    ) {}

    public static function makeFromRequest(StoreUpdateRoleUser $request, string $id = null): self
    {
        return new self(
            $id ?? $request->id,
            $request->role_id,
            $request->user_id,
        );
    }
}
