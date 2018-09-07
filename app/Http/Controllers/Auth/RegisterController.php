<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

use Auth;
use DB;
use Session;
use Redirect;

use App\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombres' => 'required|string|max:250',
            'apellidos' => 'required|string|max:250',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    protected function create(array $data)
    {
        $user=new User([
            'nombres' => $data['nombres'],
            'apellidos' => $data['apellidos'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        if($user->save())
        {
            return redirect('/')
                    ->with('registrado','registrado');
        }
    }

    public function validarUser($email)
    {
        $user=User::ValidarUser($email)->get();
        return response()->json([
            "resultado"=>count($user)
        ]);
    }

    public function registerUser(Request $request)
    {
        $validarUser=User::ValidarUser($request->email)->get();
        if(count($validarUser)>0)
        {
            $resultado=1;
            /*
            return view('auth.register')
                    ->with('errorEmail','existe')
                    ->with('nombres',$request->nombres)
                    ->with('apellidos',$request->apellidos)
                    ->with('email',$request->email);
                    */
        }
        else
        {
            $user=new User([
                'nombres' => trim($request->nombres),
                'apellidos' => trim($request->apellidos),
                'email' => trim($request->email),
                'password' => bcrypt(trim($request->password))
            ]);
    
            if($user->save())
            {		
				if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
					// Session::put('registrado','registrado');
                }	
                /*
				return redirect()->route('welcome',[
					'registrado' => 'registrado'
                ]);
                */
                $resultado=2;
            }
            else
            {
                /*
				return redirect()->route('register',[
					'errorEmail' => 'existe',
					'nombres' => $request->nombres,
					'apellidos' => $request->apellidos,
					'email' => $request->email
                ]);
                */
                $resultado=3;
            }
        }

        return response()->json(["resultado"=>$resultado]);

    }
}
