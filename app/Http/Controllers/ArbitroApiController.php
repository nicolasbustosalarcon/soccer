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
use App\Arbitro;
use DB;
class ArbitroApiController extends Controller
{
    public function index()
    {
    	$arbitros = Arbitro::all();
    	
    	return response()->json($arbitros,200);
    }
}
