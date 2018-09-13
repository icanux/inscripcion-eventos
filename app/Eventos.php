<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $table='eventos';
    protected $fillable=[
        'nombre', 'descripcion', 'direccion', 'imagen' 
    ];

    protected $dates=['fecha'];

    public function user()
    {
        return $this->belongsToMany('App\User','eventos_user','user_id','eventos_id');
    }

    public function cronogramas()
    {
        return $this->hasMany('App\Cronogramas');
    }

    //SCOPES
    public function scopeEventosInicio($query)
    {
        $query->orderBy('fecha','desc')
              ->take(3);
    }
}
