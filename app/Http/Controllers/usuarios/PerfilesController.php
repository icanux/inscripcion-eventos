<?php

namespace App\Http\Controllers\usuarios;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Auth;

use App\Universidades;
use App\UniversidadesFacultades;
use App\Facultades;
use App\UsersFacultades;
use App\User;
use Carbon\Carbon;
use App\EventosUser;

class PerfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id=Auth::user()->id;
        $userFacultades=UsersFacultades::FacultadesUsers($user_id)->get();
        if(count($userFacultades)>0)
        {
            $universidades_facultades_id=$userFacultades[0]->universidades_facultades_id;
            $universidadFacultad=UniversidadesFacultades::find($universidades_facultades_id);
            $universidad=Universidades::find($universidadFacultad->universidades_id);
            $facultad=Facultades::find($universidadFacultad->facultades_id);

            return view('usuarios.perfil.index')
                    ->with('userFacultad',$userFacultades[0])
                    ->with('universidad',$universidad)
                    ->with('facultad',$facultad);
        }
        else
        {
            return view('usuarios.perfil.index');
        }


    }

    public function edit()
    {
        $universidades=Universidades::AllUniversidades()->get();

        $user_id=Auth::user()->id;
        $userFacultades=UsersFacultades::FacultadesUsers($user_id)->get();
        $universidades_id=0;
        $facultades_id=0;
        $universidades_facultades_id=0;
        $ciclo='';
        $seccion='';
        $vigente=0;
        $facultades=array();

        if(count($userFacultades)>0)
        {
            $universidades_facultades_id=$userFacultades[0]->universidades_facultades_id;
            $universidadFacultad=UniversidadesFacultades::find($universidades_facultades_id);
            $universidad=Universidades::find($universidadFacultad->universidades_id);
            $facultad=Facultades::find($universidadFacultad->facultades_id);

            $universidades_facultades_id=$universidadFacultad->id;
            $universidades_id=$universidad->id;
            $facultades_id=$facultad->id;
            $ciclo=$userFacultades[0]->ciclo;
            $seccion=$userFacultades[0]->seccion;
            $vigente=$userFacultades[0]->vigente;

            $facultadesUni=UniversidadesFacultades::AllFacultades($universidades_id)->get();
            $facultadesList=Facultades::all();
            foreach($facultadesUni as $facultadUni)
            {
                foreach($facultadesList as $facultad)
                {
                    if($facultad->id==$facultadUni->facultades_id)
                    {
                        array_push($facultades, [
                            "universidades_facultades_id"=>$facultadUni->id,
                            "universidades_id"=>$universidades_id,
                            "facultades_id"=>$facultad->id,
                            "facultadNombre"=>$facultad->nombre
                        ]);
                    }
                }
            }
        }
        
        return view('usuarios.perfil.edit')
                ->with('universidades',$universidades)
                ->with('universidades_facultades_id',$universidades_facultades_id)
                ->with('universidades_id',$universidades_id)
                ->with('facultades_id',$facultades_id)
                ->with('facultades',$facultades)
                ->with('ciclo',$ciclo)
                ->with('seccion',$seccion)
                ->with('vigente',$vigente);
        

    }

    public function getFacultades($universidades_id)
    {
        $facultadesUni=UniversidadesFacultades::AllFacultades($universidades_id)->get();
        $facultadesList=Facultades::all();
        $facultades=array();
        foreach($facultadesUni as $facultadUni)
        {
            foreach($facultadesList as $facultad)
            {
                if($facultad->id==$facultadUni->facultades_id)
                {
                    array_push($facultades, [
                        "universidades_facultades_id"=>$facultadUni->id,
                        "universidades_id"=>$universidades_id,
                        "facultades_id"=>$facultad->id,
                        "facultadNombre"=>$facultad->nombre
                    ]);
                }
            }
        }
        return view('usuarios.perfil.facultades')
                ->with('facultades',$facultades);
    }

    public function savePerfil(Request $request)
    {
        $user_id=Auth::user()->id;
        $user=User::find($user_id);
        
        
        $user->fecha_nacimiento=$request->fechaNacimiento;
        $user->telefono_fijo=$request->telefono_fijo;
        $user->telefono_movil=$request->telefono_movil;
        $user->direccion=$request->direccion;

        if($user->save())
        {

            if(isset($request->estado))
            {

                $vigente=0;
                if($request->vigente==1)
                {
                    $vigente=1;
                }
                $usersFacultades=UsersFacultades::updateOrCreate(
                    ['user_id'=>$user->id],
                    [
                        "universidades_facultades_id"=>$request->facultades_id,
                        "vigente"=>$vigente,
                        "ciclo"=>$request->ciclo,
                        "seccion"=>$request->seccion,
                        "estado"=>1
                    ]
                );

            }

            return response()->json(["resultado"=>1]);
        }

    }

    public function misEventos()
    {
        $user_id=Auth::user()->id;
        $eventosUser=EventosUser::AllEventosUser($user_id,1)->get();
        $eventos=array();
        // return response()->json($eventosUser);
        if(count($eventosUser)>0)
        {
            foreach($eventosUser as $evento)
            {
                
                $fecha=Carbon::parse($evento->eventos->fecha);
                array_push($eventos,[
                    "id"=>$evento->id,
                    "dia"=>$fecha->day,
                    "mes"=>$fecha->shortEnglishMonth,
                    "imagen"=>$evento->eventos->imagen,
                    "nombre"=>$evento->eventos->nombre,
                    "direccion"=>$evento->eventos->direccion,
                    "descripcion"=>$evento->eventos->descripcion,
                    "fecha"=>$fecha,
                    "asistencia"=>$evento->asistencia,
                    "certificado"=>$evento->certificado,
                    "eventoId"=>$evento->eventos->id
                ]);
                
            }
        }
        return view('usuarios.miseventos.index')
                ->with('eventos',$eventos);
    }
}
