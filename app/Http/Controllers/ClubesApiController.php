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

class ClubesApiController extends Controller
{
    public function index()
    {
        $clubes = Club::all();
        return response()->json($clubes,200);

    }
    public function store(Request $request)
    {
    	$club = new Club();
    	print_r($request->input());
    	
        $club->nombreClub = $request->input('name');
        if(Input::hasfile('imagenClub')){
            $file=Input::file('imagenClub');
            $file->move(public_path().'/images/club/',$file->getClientOriginalName());
            $club->imagenClub=$file->getClientOriginalName();
        }
        $club->fundacionClub = $request->input('fundacion');
        $club->sedeClub = $request->input('sede');
        $club->idCiudad = $request->input('ciudad');
        $club->idPais = $request->input('pais');        
        $club->correoClub = $request->input('correo');
        $club->idAsociacion = $request->input('asociacion');
        $club->telefonoClub = 0;
        $club->idDirectorTecnico =$request->input('directortecnico');
        $club->idEstadio =  $request->input('estadio');
        $club->idTorneo =  $request->input('torneo');
        $club->telefonoClub = $request->input('telefono');
        $club->save();
    }
    public function show($id)
    {
        $clubes = Club::findOrFail($id);
        return response()->json($clubes,200);
    }
    public function update(Request $request, $id)
    {
        $club = Club::findOrFail($request->input('id'));
        $club->nombreClub = $request->input('name');
        if(Input::hasfile('imagenClub')){
            $file=Input::file('imagenClub');
            $file->move(public_path().'/images/club/',$file->getClientOriginalName());
            $club->imagenClub=$file->getClientOriginalName();
        }
        $club->fundacionClub = $request->input('fundacion');
        $club->sedeClub = $request->input('sede');
        $club->idCiudad = $request->input('ciudad');
        $club->idPais = $request->input('pais');        
        $club->correoClub = $request->input('correo');
        $club->telefonoClub = $request->input('telefono');
        $club->idAsociacion = $request->input('asociacion');
        $club->idDirectorTecnico = $request->input('directortecnico');
        $club->idEstadio =  $request->input('estadio');
        $club->idTorneo =  $request->input('torneo');
        $club->update();

    }

}
