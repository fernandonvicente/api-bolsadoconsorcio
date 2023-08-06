<?php

namespace App\Repositories;

use App\DTO\RoleUsers\CreateRoleUserDTO;
use App\DTO\RoleUsers\UpdateRoleUserDTO;
use stdClass;

interface RoleUserRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateRoleUserDTO $dto): stdClass;
    public function update(UpdateRoleUserDTO $dto): stdClass|null;
}
