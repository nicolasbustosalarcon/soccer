<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Jugador;
use App\Club;
use App\Asociacion;
use App\Estadio;
use App\DirectorTecnico;
use App\Ciudad;
use App\Pais;
use App\Torneo;
use App\Partido;
use App\Confederacion;
use DB;

class ConfederacionApiController extends Controller
{
	public function index()
    {
    	$confederaciones = Confederacion::all();
    	foreach ($confederaciones as $conf) {
    		$conf->imagenConfederacion = json_encode($conf->imagenConfederacion);
    	}
    	return response()->json($confederaciones,200);
    }
}
