<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nombres', 'apellidos', 'email', 'password', 'tipo', 'fecha_nacimiento', 'telefono_fijo', 'telefono_movil', 'direccion','estado','avatar'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    //RELACIONES
    public function eventos()
    {
        return $this->belongsToMany('App\Eventos','eventos_user','eventos_id','user_id');
    }

    //SCOPES
    public function scopeValidarUser($query, $email)
    {
        $query->where('email',$email);
    }

    public function scopeAllUsuarios($query, $search)
    {
        $query->where('tipo',1)
              ->orderBy('nombres');
    }

}
