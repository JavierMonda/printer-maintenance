<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Impresora extends Model
{
    protected $fillable = ['id', 'nombre', 'marca', 'modelo', 'ubicación'];

    public function consumibles()
    {
        return $this
            ->belongsToMany('App\Consumible')
            ->withTimestamps();
    }
}
