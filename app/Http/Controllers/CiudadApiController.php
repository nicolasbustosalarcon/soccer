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

class CiudadApiController extends Controller
{
    public function index()
    {
    	$ciudades = Ciudad::all();
    	return response()->json($ciudades,200);
    }
    public function store(Request $request)
    {
    	$ciudad = new Ciudad();
    	
        $ciudad->nombreCiudad = $request->input('name');
        $ciudad->idPais = $request->input('pais');        
        $ciudad->save();
    }
    public function show($id)
    {
        $ciudad = Ciudad::findOrFail($id);
        return response()->json($ciudad,200);
    }
    public function update(Request $request, $id)
    {
        $ciudad = Ciudad::findOrFail($request->input('id'));
        $ciudad->nombreCiudad = $request->input('name');
        $ciudad->idPais = $request->input('pais');
        $ciudad->update();

    }
    public function destroy($id)
    {
        $ciudades = Ciudad::find($id);
        $ciudades->delete();
    }
}
