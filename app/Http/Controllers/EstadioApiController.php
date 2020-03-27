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

class EstadioApiController extends Controller
{
    public function index()
    {
        $estadios = Estadio::all();
        return response()->json($estadios,200);

    }
    public function show($id)
    {
        $estadio = Estadio::findOrFail($id);
        return response()->json($estadio,200);
    }
    public function store(Request $request)
    {
        $estadio = new Estadio();
        $estadio->nombreEstadio = $request->input('name');
        $estadio->inauguracionEstadio = $request->input('fecha');
        $estadio->idPais = $request->input('pais');   
        $estadio->idCiudad = $request->input('ciudad');     
        $estadio->capacidadEstadio = $request->input('capacidad');
        
        $estadio->save();
    }
    public function update(Request $request, $id)
    {
        $estadio = Estadio::findOrFail($id);
        
        $estadio->nombreEstadio = $request->input('name');
        $estadio->capacidadEstadio = $request->input('capacidad');
        $estadio->idPais = $request->input('pais');   
        $estadio->idCiudad = $request->input('ciudad');     
        $estadio->inauguracionEstadio = $request->input('fecha');
               
  
        $estadio->update();
    }
    public function destroy($id)
    {
        $estadios = Estadio::find($id);
        $estadios->delete();
    }
}
