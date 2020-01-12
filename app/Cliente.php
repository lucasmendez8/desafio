<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['apellidos', 'nombres', 'direccion', 'ciudad_id', 'barrio_id', 'servicio_id', 'estado_servicio'];

    public function ciudad()
    {
        return $this->belongsTo(Ciudade::class);
    }

    public function barrio()
    {
        return $this->belongsTo(Barrio::class);
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}
