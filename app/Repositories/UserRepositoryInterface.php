<?php

namespace App\Repositories;

use App\DTO\Users\CreateUserDTO;
use App\DTO\Users\UpdateUserDTO;
use stdClass;

interface UserRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateUserDTO $dto): stdClass;
    public function update(UpdateUserDTO $dto): stdClass|null;
    public function getToken(string $token): stdClass|null;
}
