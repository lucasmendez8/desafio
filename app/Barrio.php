<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
