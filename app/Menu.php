<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'nome', 'preco'
    ];

    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class);
    }
}
