<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudade extends Model
{
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'ciudad_id', 'id');
    }
}
