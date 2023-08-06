<?php

namespace App\Services;

use App\DTO\RoleUsers\CreateRoleUserDTO;
use App\DTO\RoleUsers\UpdateRoleUserDTO;
use App\Repositories\RoleUserRepositoryInterface;
use App\Repositories\PaginationInterface;
use stdClass;

class RoleUserService
{
    public function __construct(
        protected RoleUserRepositoryInterface $repository,
    ) {}

    public function paginate(
        int $page = 1,
        int $totalPerPage = 15,
        string $filter = null
    ): PaginationInterface {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter,
        );
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateRoleUserDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateRoleUserDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }

}
