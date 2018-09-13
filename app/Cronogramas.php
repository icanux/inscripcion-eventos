<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cronogramas extends Model
{
    protected $table='cronogramas';
    protected $fillable=[
        'hora_inicio','hora_fin','area','titulo','encargado','imagen','estado','requisitos','eventos_id'
    ];

    //RELACIONES
    public function eventos()
    {
        return $this->belongsTo('App\Eventos');
    }

}
