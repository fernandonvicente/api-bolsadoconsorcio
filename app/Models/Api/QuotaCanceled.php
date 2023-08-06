<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotaCanceled extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'customer_canceled_id', 'administrator_id', 'cli_old_id', 'group', 'quota',
        'contract', 'consortium', 'document', 'purchase_date', 'registry',
        'book', 'sheets', 'matriz', 'status',
    ];
}
