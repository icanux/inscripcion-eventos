<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UniversidadesFacultades extends Model
{
    protected $table='universidades_facultades';
    protected $fillable=[
    	'universidades_id', 'facultades_id'
    ];

    //RELACIONES

    public function universidad()
    {
    	return $this->belongsTo('App\Universidades');
    }

    public function facultad()
    {
    	return $this->belongsTo('App\Facultades');
    }

    //SCOPES
    public function scopeAllFacultades($query, $universidades_id)
    {
        $query->where('universidades_id',$universidades_id);
    }


}
