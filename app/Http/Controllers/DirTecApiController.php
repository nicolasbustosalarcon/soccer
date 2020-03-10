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

class DirTecApiController extends Controller
{
    public function index()
    {
    	$dts = DirectorTecnico::all();
    	foreach ($dts as $dt) {
    		$dt->imagenDirectorTecnico = json_encode($dt->imagenDirectorTecnico);
    	}
    	return response()->json($dts,200);
    }
}
