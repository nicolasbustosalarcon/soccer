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
use Carbon\Carbon;

class JugadoresApiController extends Controller
{
    public function index()
    {
    	$jugadores = Jugador::all();
    	foreach ($jugadores as $jugador) {
            if ($jugador->imagenJugador != NULL) {
                if(file_exists('/Users/luisfuenzalidalizana/Documents/GitHub/AppMoviles/src/assets/img/'.$jugador->imagenJugador)== FALSE){
                    copy(public_path().'/images/jugador/'.$jugador->imagenJugador,'/Users/luisfuenzalidalizana/Documents/GitHub/AppMoviles/src/assets/img/'.$jugador->imagenJugador);
                }
            }
        }
    	return response()->json($jugadores,200);
    }
    public function store(Request $request)
    {
    	$jugadores = new Jugador();
    	
        $jugadores->nombreJugador = $request->input('nombreJugador');
        $jugadores->apellidosJugador = $request->input('apellidosJugador'); 
        $jugadores->nacimientoJugador = $request->input('nacimientoJugador'); 
        $fechaComoEntero = strtotime($jugadores->nacimientoJugador);
        $anio = date("Y", $fechaComoEntero);
        $mes = date("m", $fechaComoEntero);
        $dia = date("d", $fechaComoEntero);
        $jugadores->edadJugador= Carbon::createFromDate($anio,$dia,$mes)->age;
        $jugadores->posicionJugador = $request->input('posicionJugador'); 
        $jugadores->alturaJugador = $request->input('alturaJugador'); 
        $jugadores->pesoJugador = $request->input('pesoJugador'); 
        $jugadores->pieJugador = $request->input('pieJugador');
        $jugadores->idClub = $request->input('idClub'); 
        $jugadores->idPais = $request->input('idPais');         
        $jugadores->save();
    }
    public function show($id)
    {
        $jugadores = Jugador::findOrFail($id);
        return response()->json($jugadores,200);
    }
    public function update(Request $request, $id)
    {
        $jugadores = Jugador::findOrFail($request->input('idJugador'));
        $jugadores->nombreJugador = $request->input('nombreJugador');
        $jugadores->apellidosJugador = $request->input('apellidosJugador'); 
        $jugadores->nacimientoJugador = $request->input('nacimientoJugador'); 
        $fechaComoEntero = strtotime($jugadores->nacimientoJugador);
        $anio = date("Y", $fechaComoEntero);
        $mes = date("m", $fechaComoEntero);
        $dia = date("d", $fechaComoEntero);
        $jugadores->edadJugador= Carbon::createFromDate($anio,$dia,$mes)->age;
        $jugadores->posicionJugador = $request->input('posicionJugador'); 
        $jugadores->alturaJugador = $request->input('alturaJugador'); 
        $jugadores->pesoJugador = $request->input('pesoJugador'); 
        $jugadores->pieJugador = $request->input('pieJugador');
        $jugadores->idClub = $request->input('idClub'); 
        $jugadores->idPais = $request->input('idPais');  
        $jugadores->update();

    }
    public function destroy($id)
    {
        $jugadores = Jugador::find($id);
        $jugadores->delete();
    }
}
