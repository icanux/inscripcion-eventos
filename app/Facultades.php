<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultades extends Model
{
    protected $table='facultades';
    protected $fillable=[
    	'nombre'
    ];

    //RELACIONES

    //RELACIONES

    public function universidades()
    {
    	return $this->belongsToMany('Universidades','universidades_id','facultades_id');
    }

}
