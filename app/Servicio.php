<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public function clientes()
    {
        $this->hasMany(Cliente::class);
    }
}
