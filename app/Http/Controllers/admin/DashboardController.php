<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Auth;
use App\User;
use App\Universidades;
use App\UniversidadesFacultades;
use App\Facultades;
use App\UsersFacultades;
use App\Eventos;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $eventos=Eventos::EventosInicio()->get();
        $universidades=Universidades::AllUniversidades()->get();
        $facultadesUni=UniversidadesFacultades::AllFacultades($universidades[0]->id)->get();
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
                        "universidades_id"=>$universidades[0]->id,
                        "facultades_id"=>$facultad->id,
                        "facultadNombre"=>$facultad->nombre
                    ]);
                }
            }
        }
        
        $usuarios=User::AllUsuarios('')->get();
        return view('admin.index')
                ->with('usuarios',$usuarios)
                ->with('universidades',$universidades)
                ->with('facultades',$facultades)
                ->with('eventos',$eventos);
    }

    public function searchUsuarios()
    {
        $usuarios=User::AllUsuarios('')->get();
        return view('admin.usuarios.table')
                ->with('usuarios',$usuarios);
    }

    public function registrarUsuario(Request $request)
    {
        $validarUser=User::ValidarUser($request->email)->get();
        if(count($validarUser)>0)
        {
            //email registrado
            $resultado=1;
        }
        else
        {
            $pass=str_random(10);
            $user=new User([
                'nombres' => trim($request->nombres),
                'apellidos' => trim($request->apellidos),
                'email' => trim($request->email),
                'password' => bcrypt($pass),
                'tipo'=> 1,
                'estado'=>1,
                'avatar'=>'default.png'
            ]);
    
            if($user->save())
            {		
                if($request->uni==1)
                {
                    $usersFacultades=UsersFacultades::updateOrCreate(
                        ['user_id'=>$user->id],
                        [
                            "universidades_facultades_id"=>$request->facultades_id,
                            "vigente"=>1,
                            "ciclo"=>$request->ciclo,
                            "seccion"=>$request->seccion,
                            "estado"=>1
                        ]
                    );
                }

                $user_id=$user->id;
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

                //REGISTRADO
                $resultado=2;
            }
            else
            {
                //ERROR
                $resultado=3;
            }
        }

        return response()->json(["resultado"=>$resultado]);

    }


    public function getDetalleEvento($eventos_id)
    {
        $evento=Eventos::find($eventos_id);
        return view('admin.usuarios.evento')
                ->with('evento',$evento);
    }
}
