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
        $paises = Pais::all();
        $asociaciones = Asociacion::all();
        $torneos = Torneo::all();
        
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
        $club->idEstadio = 2;
        $club->idTorneo = 2;
        $club->save();
    }
    public function show($id)
    {
        $clubes = Club::findOrFail($id);
        return response()->json($clubes,200);
    }
    public function update(Request $request, $id)
    {
        $club = Club::findOrFail($id);
        $club->nombreClub = $request->input('nombreClub');
        if(Input::hasfile('imagenClub')){
            $file=Input::file('imagenClub');
            $file->move(public_path().'/images/club/',$file->getClientOriginalName());
            $club->imagenClub=$file->getClientOriginalName();
        }
        $club->fundacionClub = $request->input('fundacionClub');
        $club->sedeClub = $request->input('sedeClub');
        $club->idCiudad = $request->input('idCiudad');
        $club->idPais = $request->input('idPais');        
        $club->correoClub = $request->input('correoClub');
        $club->telefonoClub = $request->input('telefonoClub');
        $club->idAsociacion = $request->input('idAsociacion');
        $club->idDirectorTecnico = $request->input('idDirectorTecnico');
        $club->idEstadio = $request->input('idEstadio');
  
        $club->update();

        return response()->json($clubes,200);

    }

}
