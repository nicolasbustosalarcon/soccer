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

class TorneoApiController extends Controller
{
    public function index()
    {
        $torneos = Torneo::all();
        return response()->json($torneos,200);

    }
    public function show($id)
    {
        $torneo = Torneo::findOrFail($id);
        return response()->json($torneo,200);
    }
    public function update(Request $request, $id)
    {
        $torneo = Torneo::findOrFail($id);
        
        $torneo->nombreTorneo = $request->input('name');
        $torneo->idClubCampeon = $request->input('club');
        $torneo->edicion = $request->input('edicion');
        $torneo->idConfederacion = $request->input('confederacion');
        $torneo->idAsociacion = $request->input('asociacion');
        if(Input::hasfile('imagenTorneo')){
            $file=Input::file('imagenTorneo');
            $file->move(public_path().'/images/torneos/',$file->getClientOriginalName());
            $torneo->imagenTorneo=$file->getClientOriginalName();
        }
        $torneo->update();
    }
    public function store(Request $request)
    {
        $torneo = new Torneo();
        $torneo->nombreTorneo = $request->input('name');
        $torneo->idClubCampeon = $request->input('club');
        if(Input::hasfile('imagenTorneo')){
            $file=Input::file('imagenTorneo');
            $file->move(public_path().'/images/torneos/',$file->getClientOriginalName());
            $torneo->imagenTorneo=$file->getClientOriginalName();
        }
        $torneo->edicion = $request->input('edicion');
        $torneo->idConfederacion = $request->input('confederacion');
        $torneo->idAsociacion = $request->input('asociacion');
        

        $torneo->save();
    }
    public function destroy($id)
    {
        $torneo = Torneo::find($id);
        $torneo->delete();
    }
}
