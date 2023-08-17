<?php

namespace App\DTO\QuotasCanceled;

use App\Http\Requests\StoreUpdateQuotaCanceled;

class CreateQuotaCanceledDTO
{
    public function __construct(
        public string $user_id,
        public string $customer_canceled_id,
        public string $administrator_id,
        public string $cli_old_id,
        public string $group,
        public string $quota,
        public string $contract,
        public string $consortium,
        public string $document,
        public string $purchase_date,
        public string $registry,
        public string $book,
        public string $sheets,
        public string $matriz,
        public string $status,
    ) {}

    public static function makeFromRequest(StoreUpdateQuotaCanceled $request): self
    {
        return new self(
            $request->user()->id,
            $request->customer_canceled_id,
            $request->administrator_id,
            $request->cli_old_id,
            $request->group,
            $request->quota,
            $request->contract,
            $request->consortium,
            $request->document,
            $request->purchase_date,
            $request->registry,
            $request->book,
            $request->sheets,
            $request->matriz,
            $request->status,
        );
    }
}
