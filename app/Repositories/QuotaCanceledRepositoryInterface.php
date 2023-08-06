<?php

namespace App\Repositories;

use App\DTO\QuotasCanceled\CreateQuotaCanceledDTO;
use App\DTO\QuotasCanceled\UpdateQuotaCanceledDTO;
use stdClass;

interface QuotaCanceledRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateQuotaCanceledDTO $dto): stdClass;
    public function update(UpdateQuotaCanceledDTO $dto): stdClass|null;
}
