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
use DB;

class AsociacionApiController extends Controller
{
	public function index()
    {
    	$asociaciones = Asociacion::all();
    	foreach ($asociaciones as $as) {
    		$as->imagenAsociacion = json_encode($as->imagenAsociacion);
    	}
    	return response()->json($asociaciones,200);
    }
}
