<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventosUser extends Model
{
    protected $table='eventos_user';
    protected $fillable=[
        'user_id','eventos_id','certificado','asistencia','estado'
    ];

    //RELACIONES
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function eventos()
    {
    	return $this->belongsTo('App\Eventos');
    }

    //SCOPES
    public function scopeAllEventosUser($query, $user_id, $estado)
    {
        $query->with('eventos')
              ->where('user_id',$user_id)
              ->where(function($q) use($estado){
                  if($estado==1 || $estado==0)
                  {
                      $q->where('estado',$estado);
                  }
              } )
              ->orderBy('id','desc');
    }

    public function scopeRelacionEventoUser($query, $eventos_id, $user_id,$estado)
    {
        $query->with('eventos')
              ->where('user_id',$user_id)
              ->where('eventos_id',$eventos_id)
              ->where(function($q) use($estado){
                if($estado==1 || $estado==0)
                {
                    $q->where('estado',$estado);
                }
                } )
              ->orderBy('id','desc');
    }
}
