<?php

namespace App\Repositories;

use App\DTO\Operators\CreateOperatorDTO;
use App\DTO\Operators\UpdateOperatorDTO;
use App\Models\Api\Operator;
use App\Repositories\OperatorRepositoryInterface;
use stdClass;

class OperatorEloquentORM implements OperatorRepositoryInterface
{
    public function __construct(
        protected Operator $model
    ) {}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model
                       ->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model->all()->toArray();

    }

    public function findOne(string $id): stdClass|null
    {
        $operator = $this->model->find($id);

        if (!$operator) {
            return null;
        }

        return (object) $operator->toArray();

    }
    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateOperatorDTO $dto): stdClass
    {

        $operator = $this->model->create(
            (array) $dto
        );

        return (object) $operator->toArray();
    }

    public function update(UpdateOperatorDTO $dto): stdClass|null
    {
        if (!$operator = $this->model->find($dto->id)) {
            return null;
        }

        $operator->update(
            (array) $dto
        );

        return (object) $operator->toArray();



    }
}
