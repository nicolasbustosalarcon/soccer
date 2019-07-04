<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
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
use App\Favorito;
use DB;
use Auth;

class FavoritoController extends Controller
{
    public function index()
    {
    	$id_club=array(array('id'));
    	$club_favorito=Favorito::all();
    	$i=0;
    	$entro = 0;
    	foreach ($club_favorito as $club) {
    		if ($club->idusuario == Auth::user()->id) {
    			$id_club[$i]['id'] = $club->idClub;
    			$i = $i + 1;
    			$entro = 1;
    		}
    	}
    	if ($entro == 0) {
    		$partidos=Partido::all();
    		$partidos_visita=1;
    	}
    	$id_u = Auth::user()->id;
    	$clubes=Club::all();
    	if($entro == 1){
    	   $partidos=Partido::all()->where('clubLocalPartido','=',$id_club[0]['id']);
    	   $partidos_visita=Partido::all()->where('clubVisitaPartido','=',$id_club[0]['id']);
        }
        //$partidos = DB::table('partidos as p')->select('p.idPartido','p.clubLocalPartido','p.clubVisitaPartido','p.fechaPartido','p.horaPartido','p.jornadaPartido','p.idEstadio','p.idArbitroCentral','p.idTorneo','p.TipoPartido','p.golesVisitaPartido','p.golesLocalPartido','p.estadoPartido','p.idArbitroAsistente1','p.idArbitroAsistente2','p.idCuartoArbitro','p.leido','p.publicoPresente')
        $torneos=Torneo::all();
        //Ordenar los partidos por dia
        $hoy = getdate();
        $dia = $hoy['mday'];
        $mes = $hoy['mon'];
        $year = $hoy['year'];
        $fecha = "$year"."-"."$mes"."-"."$dia";
        
        return view('favorito.index',  ['entro' =>$entro,'id_u' => $id_u,'club_favorito' => $club_favorito,'partidos_visita' => $partidos_visita,'partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos, 'fecha' =>$fecha]);
    }
    public function create(Request $request)
    {

        $clubes=Club::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        return view('favorito.create', ['ciudades' => $ciudades->toArray(), 'clubes' => $clubes->toArray(), 'estadios' => $estadios->toArray(), 'paises' => $paises->toArray()]);
    }
    public function store(Request $request)
    {
        $favorito = new Favorito();
        $favorito->idusuario = Auth::user()->id;
        $favorito->idClub = $request->input('club');
        $favorito->save();
        return Redirect::to('favorito');
    }
}
