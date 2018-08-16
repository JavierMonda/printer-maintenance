<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumible extends Model
{
    protected $fillable = ['id', 'tipo', 'nombre', 'cantidad'];

    public function impresoras()
	{
	return $this
	    ->belongsToMany('App\Impresora')
	    ->withTimestamps();
	}
}
