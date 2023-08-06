<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'state_id'];

    public function state()
	{
		return $this->belongsTo('App\Models\All\State');
	}
}
