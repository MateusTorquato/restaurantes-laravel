<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    protected $fillable = [
        'nome', 'descricao', 'endereco'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
