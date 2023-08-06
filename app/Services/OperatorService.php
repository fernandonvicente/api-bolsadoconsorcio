<?php

namespace App\Services;

use App\DTO\Operators\CreateOperatorDTO;
use App\DTO\Operators\UpdateOperatorDTO;
use App\Repositories\OperatorRepositoryInterface;
use App\Repositories\PaginationInterface;
use stdClass;

class OperatorService
{
    public function __construct(
        protected OperatorRepositoryInterface $repository,
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

    public function new(CreateOperatorDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateOperatorDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }

}
