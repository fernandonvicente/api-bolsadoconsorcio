<?php

namespace App\Repositories;

use App\DTO\Operators\CreateOperatorDTO;
use App\DTO\Operators\UpdateOperatorDTO;
use stdClass;

interface RoleUserRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateOperatorDTO $dto): stdClass;
    public function update(UpdateOperatorDTO $dto): stdClass|null;
}
