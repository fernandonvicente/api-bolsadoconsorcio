<?php

namespace App\Repositories;

use App\DTO\Users\CreateUserDTO;
use App\DTO\Users\UpdateUserDTO;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use stdClass;

class UserEloquentORM implements UserRepositoryInterface
{
    public function __construct(
        protected User $model
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
        $result = $this->model->find($id);

        if (!$result) {
            return null;
        }

        return (object) $result->toArray();

    }
    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

    public function new(CreateUserDTO $dto): stdClass
    {

        $result = $this->model->create(
            (array) $dto
        );

        return (object) $result->toArray();
    }

    public function update(UpdateUserDTO $dto): stdClass|null
    {
        if (!$result = $this->model->find($dto->id)) {
            return null;
        }

        $result->update(
            (array) $dto
        );

        return (object) $result->toArray();

    }

    public function getToken(string $token): stdClass|null
    {
        $result = $this->model
                ->where(function ($query) use ($token) {
                    if ($token) {
                        $query->where('token', $token);
                    }
                })
                ->first();

        if (!$result) {
            return null;
        }

        return (object) $result->toArray();

    }
}
