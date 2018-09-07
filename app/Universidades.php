<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidades extends Model
{
    protected $table='universidades';
    protected $fillable=[
    	'nombre', 'direccion', 'distritos_id'
    ];

    //RELACIONES
    

    public function facultades()
    {
    	return $this->belongsToMany('App\Facultades','universidades_facultades','universidades_id','facultades_id');
    }

    //SCOPE
    public function scopeAllUniversidades($query)
    {
        $query->with('facultades')
              ->orderBy('nombre');
    }   
}
