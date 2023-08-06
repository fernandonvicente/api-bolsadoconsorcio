<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','label','status'
    ];

    public function permissions(){        
         return $this->belongsToMany('App\Models\Api\Permission');
    }
}
