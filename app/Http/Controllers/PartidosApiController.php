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
 
/*idPartido
clubLocalPartido
clubVisitaPartido
fechaPartido
horaPartido
jornadaPartido
idEstadio
idArbitroCentral
idTorneo
TipoPartido
golesVisitaPartido
golesLocalPartido
estadoPartido
idArbitroAsistente1
idArbitroAsistente2
idCuartoArbitro*/

class PartidosApiController extends Controller
{
    public function index()
    {
        $partidos = Partido::all();
        return response()->json($partidos,200);

    }
    public function store(Request $request)
    {
    	$partidos = new Partido();
        $partidos->clubLocalPartido = $request->input('clubLocalPartido');
        $partidos->clubVisitaPartido = $request->input('clubVisitaPartido');
        $partidos->fechaPartido = $request->input('fechaPartido');
        $partidos->horaPartido = $request->input('horaPartido');
        $partidos->jornadaPartido = $request->input('jornadaPartido');
        $partidos->idEstadio = $request->input('idEstadio');
        $partidos->idArbitroCentral = $request->input('idArbitroCentral');
        $partidos->idTorneo = $request->input('idTorneo');
        $partidos->TipoPartido = $request->input('TipoPartido');
        $partidos->golesVisitaPartido = $request->input('golesVisitaPartido');
        $partidos->golesLocalPartido = $request->input('golesLocalPartido');
        $partidos->estadoPartido = $request->input('estadoPartido');
        $partidos->idArbitroAsistente1 = $request->input('idArbitroAsistente1');
        $partidos->idArbitroAsistente2 = $request->input('idArbitroAsistente2');
        $partidos->idCuartoArbitro = $request->input('idCuartoArbitro');
        $partidos->save();
    }
    public function show($id)
    {
        $partidos = Partido::findOrFail($id);
        return response()->json($partidos,200);
    }
    public function update(Request $request, $id)
    {
        $partidos = Club::findOrFail($request->input('id'));
        $partidos->update();

    }
    public function destroy($id)
    {
        $partidos = Club::find($id);
        $partidos->delete();
    }
}
