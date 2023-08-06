<?php

namespace App\Repositories;

use App\DTO\QuotasCanceled\CreateQuotaCanceledDTO;
use App\DTO\QuotasCanceled\UpdateQuotaCanceledDTO;
use App\Models\Api\QuotaCanceled;
use App\Repositories\QuotaCanceledRepositoryInterface;
use stdClass;

class QuotaCanceledEloquentORM implements QuotaCanceledRepositoryInterface
{
    public function __construct(
        protected QuotaCanceled $model
    ) {}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $object = $this->model
                       ->paginate($totalPerPage, ['*'], 'page', $page);

        return new PaginationPresenter($object);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model->all()->toArray();

    }

    public function findOne(string $id): stdClass|null
    {
        $object = $this->model->find($id);

        if (!$object) {
            return null;
        }

        return (object) $object->toArray();

    }
    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateQuotaCanceledDTO $dto): stdClass
    {

        $object = $this->model->create(
            (array) $dto
        );

        return (object) $object->toArray();
    }

    public function update(UpdateQuotaCanceledDTO $dto): stdClass|null
    {
        if (!$object = $this->model->find($dto->id)) {
            return null;
        }

        $object->update(
            (array) $dto
        );

        return (object) $object->toArray();



    }
}
