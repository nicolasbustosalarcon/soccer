<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use DateTime;
use Auth;
use DB;
use PDF;
use Carbon\Carbon;
use App\Partido;
use App\Club;
use App\Asociacion;
use App\Estadio;
use App\Ciudad;
use App\Pais;
use App\Torneo;
use App\Arbitro;
use App\Jugador;
use App\TrayectoriaJugador;
use App\Historial;
use App\DirectorTecnico;

class ReporteController extends Controller
{
    public function invoice($id) 
    {
    	$paises = Pais::all();
        $clubes = Club::all();
        $trayectorias = DB::table('TrayectoriasJugadores as tj')
        ->join('clubes as c','tj.idClub','=','c.idClub')
        ->select('tj.camisetaJugador','c.nombreClub as nombreClub','c.imagenClub as imagen','tj.idClub')
        ->where('tj.idJugador','=',$id)
        ->get();
        $torneos = Torneo::all();
    	$jugador = Jugador::findOrFail($id);
        $pdf = PDF::loadView('imprimir.reporte', compact('paises','jugador','clubes','trayectorias','torneos'));
        return $pdf->download('pruebapdf.pdf');
    }

    public function informe_partido($id)
    {
    	$partidos = Partido::findOrFail($id);
       
        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();
        $arbitros=Arbitro::all();
        $todospartidos=Partido::all();
        $historial=Historial::all();
        $pdf = PDF::loadView('imprimir.reporte_partido', compact('paises','partidos','clubes','asociaciones','torneos','arbitros','todospartidos','historial','estadios'));
        return $pdf->download('reporte_partido.pdf');
    }

    public function informe_club($id)
    {
    	$clubes = Club::findOrFail($id);
       
        $paises = Pais::all();
        $asociaciones = Asociacion::all();
        $torneos = Torneo::all();
        $estadios = Estadio::all();
        $ciudades = Ciudad::all();
        $partidos = Partido::all();
        $jugadores = Jugador::orderBy('posicionJugador')->get();
        $allclubs = Club::all();
        $pdf = PDF::loadView('imprimir.reporte_club', compact('paises','partidos','clubes','asociaciones','torneos','estadios','ciudades','jugadores','allclubs'));
        return $pdf->download('reporte_club.pdf');
    }
    public function informe_dt($id) 
    {
        $paises = Pais::all();
        $clubes = Club::all();
        $trayectorias = DB::table('TrayectoriasDirectoresTecnicos as tj')
        ->join('clubes as c','tj.idClub','=','c.idClub')
        ->select('c.nombreClub as nombreClub','c.imagenClub as imagen','tj.idClub')
        ->where('tj.idDirectorTecnico','=',$id)
        ->get();
        $torneos = Torneo::all();
        $dts = DirectorTecnico::findOrFail($id);
        $pdf = PDF::loadView('imprimir.reporte_dt', compact('paises','dts','clubes','trayectorias','torneos'));
        return $pdf->download('reportedt.pdf');
    }

}
