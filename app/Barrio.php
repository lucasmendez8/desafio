<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    protected $fillable = ['nombre', 'ciudad_id'];

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function ciudad()
    {
        return $this->belongsTo(Ciudade::class);
    }
}
