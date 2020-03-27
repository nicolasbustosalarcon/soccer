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
use App\Continente;
use App\Torneo;
use App\Partido;
use DB;


class ContinentesApiController extends Controller
{
    public function index()
    {
    	$continentes = Continente::all();
    	return response()->json($continentes,200);
    }
}