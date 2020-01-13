<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = ['nombre'];

    public function clientes()
    {
        $this->hasMany(Cliente::class);
    }
}
