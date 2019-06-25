<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Pais;
use App\Club;
use App\Jugador;
use App\TrayectoriaJugador;
use App\Torneo;
use DateTime;
use Auth;
use DB;
use PDF;
use Carbon\Carbon;

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
}
