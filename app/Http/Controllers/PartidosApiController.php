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
