<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersFacultades extends Model
{
    protected $table='users_facultades';
    protected $fillable=[
        'user_id', 'universidades_facultades_id', 'vigente', 'ciclo', 'seccion', 'estado'
    ];

    //RELACIONES


    
    //SCOPES
    public function scopeFacultadesUsers($query,$user_id)
    {
        $query->where('user_id',$user_id);
    }
}
