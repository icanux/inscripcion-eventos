<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Session;
use Auth;
use App\User;
use Redirect;

use App\Eventos;

class HomeController extends Controller
{
	public function index()
	{
		$eventos=Eventos::EventosInicio()->get();
		return view('welcome')
				->with('eventos',$eventos);
	}	

	public function notFound()
	{
		return view('error');
	}

}

