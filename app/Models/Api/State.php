<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'uf'];
    
    public function cities()
    {
        return $this->hasMany('App\Models\Api\City');
    }
}
