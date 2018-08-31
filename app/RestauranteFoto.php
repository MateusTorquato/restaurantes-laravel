<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestauranteFoto extends Model
{
    protected $fillable = [
    	'foto'
    ];
    
    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }
}
