<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Restaurante extends Model
{
    use HasSlug;

    protected $fillable = [
        'nome', 'descricao', 'endereco', 'slug'
    ];

    public function getSlugOptions() : SlugOptions
	{
		return SlugOptions::create()
		                  ->generateSlugsFrom('nome')
		                  ->saveSlugsTo('slug');
    }
    
    public function getRouteKeyName()
	{
		return 'slug';
	}

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function fotos()
    {
        return $this->hasMany(RestauranteFoto::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
