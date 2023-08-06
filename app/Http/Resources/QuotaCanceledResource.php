<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuotaCanceledResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_canceled_id' => $this->customer_canceled_id,
            'administrator_id' => $this->administrator_id,
            'cli_old_id' => $this->cli_old_id,
            'group' => $this->group,
            'quota' => $this->quota,
            'contract' => $this->contract,
            'consortium' => $this->consortium,
            'document' => $this->document,
            'purchase_date' => $this->purchase_date,
            'registry' => $this->registry,
            'book' => $this->book,
            'sheets' => $this->sheets,
            'status' => $this->status,
            'dt_created' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];
    }
}
