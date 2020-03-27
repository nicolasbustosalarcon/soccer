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

class PaisesApiController extends Controller
{
	public function index()
    {
    	$paises = Pais::all();
    	return response()->json($paises,200);
    }

    public function store(Request $request)
    {
    	$paises = new Pais();
    	
        $paises->nombrePais = $request->input('nombrePais');
        
        $paises->idContinente = $request->input('idContinente');         
        $paises->save();
    }
    public function show($id)
    {
        $paises = Pais::findOrFail($id);
        return response()->json($paises,200);
    }
    public function update(Request $request, $id)
    {
        $paises = Pais::findOrFail($request->input('idJugador'));
        $paises->nombrePais = $request->input('nombrePais');
  
        $paises->idContinente = $request->input('idContinente');  
        $paises->update();

    }
    public function destroy($id)
    {
        $paises = Pais::find($id);
        $paises->delete();
    }
}