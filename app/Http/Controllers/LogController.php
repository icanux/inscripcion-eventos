<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;


use Auth;
use DB;
use Session;
use App\User;
use Redirect;

class LogController extends Controller
{
    public function store(LoginRequest $request){

		$user=DB::table('users')->where('email',$request['email'])->take(1)->get();

		if(count($user)==0){
			$request->session()->flash('error_email','Email no existe');
			return Redirect::to('/login');
		}

		if(Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){
			$Usuario = User::find($user[0]->id);
			$Usuario->remember_token=csrf_token();
			$Usuario->save();
			if(Auth::user()){
				return Redirect::to('/');
			}
		}

		$request->session()->flash('error_password','Contraseña incorrecta');
		return Redirect::to('/login');
	}
}
