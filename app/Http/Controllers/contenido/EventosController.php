<?php

namespace App\Http\Controllers\contenido;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

use App\Eventos;
use App\EventosUser;

use Auth;

class EventosController extends Controller
{
    public function index()
    {
        $eventos=Eventos::EventosInicio()->get();
        return view('contenido.eventos.index')
                ->with('eventos',$eventos);
    }

    public function infoEvento($id)
    {
        if(isset(Auth::user()->id))
        {
            $user_id=Auth::user()->id;
        }
        else
        {
            $user_id=0;
        }
        $evento=Eventos::find($id);
        $eventosUser=EventosUser::RelacionEventoUser($evento->id,$user_id,1)->get();
        return view('contenido.eventos.evento')
                ->with('evento',$evento)
                ->with('eventosUser',$eventosUser);

    }

    public function inscripcion($id, $accion, $certificado)
    {
        $user_id=Auth::user()->id;
        //accion sera 0 si es inscripcion y 1 si se cancelara inscripcion
        //Pasamos 3 en el estado paa que no filtre el estado
        $eventosUser=EventosUser::RelacionEventoUser($id,$user_id,3)->get();

        if(count($eventosUser)>0)
        {
            $eventoUser=EventosUser::find($eventosUser[0]->id);
            $eventoUser->certificado=$certificado;
            $eventoUser->estado=$accion;
        }
        else
        {
            $eventoUser=new EventosUser([
                'user_id'=>$user_id,
                'eventos_id'=>$id,
                'certificado'=>$certificado,
                'asistencia'=>0,
                'estado'=>1
            ]);
        }

        $eventoUser->save();

        $evento=Eventos::find($id);
        $eventosUserNew=EventosUser::RelacionEventoUser($evento->id,$user_id,1)->get();

        return redirect('evento/'.$evento->id)
                    ->with('evento',$evento)
                    ->with('eventosUser',$eventosUser);
        // return view('contenido.eventos.evento')
        //         ->with('evento',$evento)
        //         ->with('eventosUser',$eventosUserNew);

    }

}

