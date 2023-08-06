<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id','name','label','session',
    ];


    public function roles(){
        return $this->belongsToMany('App\Models\Api\Role');
    }
}
