<?php

namespace App\Http\Controllers\contenido;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;
use App\EventosUser;

use App\Eventos;
use Illuminate\Support\Facades\DB;

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

    public function inscripcion($id)
    {
        $user_id=Auth::user()->id;
        $evento=Eventos::find($id);
        $eventosUser=EventosUser::RelacionEventoUser($evento->id,$user_id,1)->get();
        $listaInscripciones=array();

        $certificado=0;
        if(count($eventosUser)>0)
        {
            $certificado=$eventosUser[0]->certificado;
        }

        foreach($eventosUser as $eventoUser)
        {
            array_push($listaInscripciones,$eventoUser->cronogramas_id);
        }

        return view('contenido.eventos.inscripcion')
                ->with('evento',$evento)
                ->with('eventosUser',$eventosUser)
                ->with('listaInscripciones',$listaInscripciones)
                ->with('certificado',$certificado);

    }

    public function saveInscripcion(Request $request)
    {
        $user_id=Auth::user()->id;
        $certificado=0;
        if($request->certificado)
        {
            $certificado=1;
        }

        $edicon=DB::table('eventos_user')->where('user_id',$user_id)->where('eventos_id',$request->eventos_id)->update(['estado'=>0]);

        if(count($request->ponencias)>0)
        {
            for($i=0;$i<count($request->ponencias);$i++)
            {
                $cronogramas_id=$request->ponencias[$i];
                $eventoUser=EventosUSer::updateOrCreate(
                    ['cronogramas_id'=>$cronogramas_id, 'user_id'=>$user_id],
                    ['certificado'=>$certificado, 'estado'=>1, 'eventos_id'=>$request->eventos_id,'asistencia'=>0]
                );
            }
        }

        if(count($request->talleres)>0)
        {
            for($i=0;$i<count($request->talleres);$i++)
            {
                $cronogramas_id=$request->talleres[$i];
                $eventoUser=EventosUSer::updateOrCreate(
                    ['cronogramas_id'=>$cronogramas_id, 'user_id'=>$user_id],
                    ['certificado'=>$certificado, 'estado'=>1, 'eventos_id'=>$request->eventos_id,'asistencia'=>0]
                );
            }
        }

        return redirect()->route('evento', ['id'=>$request->eventos_id]);
    }

}

