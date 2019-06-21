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
use DB;




class PartidoController extends Controller
{
//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partido::all();
        $clubes=Club::all();
        $torneos=Torneo::all();
        
        //Ordenar los partidos por dia
        $hoy = getdate();
        $dia = $hoy['mday'];
        $mes = $hoy['mon'];
        $year = $hoy['year'];
        $fecha = "$year"."-"."$mes"."-"."$dia";
        



        return view('partido.index',  ['partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos, 'fecha' =>$fecha]);

    }

    public function search($search){

        $search = urldecode($search);
        $club = Club::select()
                ->where('nombreClub', 'LIKE', '%'.$search.'%')
                ->orderBy('idClub', 'desc')
                ->get();

        $jugadores = Jugador::select()
                ->where('nombreJugador', 'LIKE', '%'.$search.'%')
                ->orwhere('apellidosJugador', 'LIKE', '%'.$search.'%')
                ->orderBy('idJugador', 'desc')
                ->get();

        $torneos = Torneo::select()
                ->where('nombreTorneo', 'LIKE', '%'.$search.'%')
                ->orderBy('idTorneo', 'desc')
                ->get();

        $estadios = Estadio::select()
                ->where('nombreEstadio', 'LIKE', '%'.$search.'%')
                ->orderBy('idEstadio', 'desc')
                ->get();



        return view('partido.search',  ['club' => $club, "jugadores" => $jugadores,  "torneos" => $torneos,  "estadios" => $estadios]);
        
    }
//-------------------------------------------------------------------------------------------------------------------


//------Función que retorna las variables para la vista create-------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();
        $arbitros=Arbitro::all();

        return view('partido.create', ['asociaciones' => $asociaciones->toArray(), 'ciudades' => $ciudades->toArray(), 'clubes' => $clubes->toArray(), 'estadios' => $estadios->toArray(), 'paises' => $paises->toArray(), 'torneos' => $torneos->toArray(), 'arbitros' => $arbitros->toArray()]);
    }
//------------------------------------------------------------------------------------------------------------------


//----------------Función para guardar un nuevo dato-----------------------------------------------------------------
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $partido = new Partido();
        $partido->clubLocalPartido = $request->input('clubLocalPartido');
        $partido->clubVisitaPartido = $request->input('clubVisitaPartido');
        $partido->fechaPartido = $request->input('fechaPartido');
        $partido->horaPartido = $request->input('horaPartido');
        $partido->jornadaPartido = $request->input('jornadaPartido');
        $partido->idEstadio = $request->input('idEstadio');
        $partido->idArbitroCentral = $request->input('idArbitroCentral');
        $partido->idTorneo = $request->input('idTorneo');        
        $partido->TipoPartido = $request->input('TipoPartido');
        $partido->golesVisitaPartido = $request->input('golesVisitaPartido');
        $partido->golesLocalPartido = $request->input('golesLocalPartido');
        $partido->estadoPartido = $request->input('estadoPartido');
        $partido->idArbitroAsistente1 = $request->input('idArbitroAsistente1');
        $partido->idArbitroAsistente2 = $request->input('idArbitroAsistente2');
        $partido->idCuartoArbitro = $request->input('idCuartoArbitro');


        
        $partido->save();

        return Redirect::to('partido');
    }
//-------------------------------------------------------------------------------------------------------------------


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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

        $partidos_historial = array(array('local','visita','goles_local','goles_visita'));
        $contador = 0;
        foreach ($todospartidos as $todos) {
            if ($todos->clubLocalPartido == $partidos->clubLocalPartido && $todos->clubVisitaPartido==$partidos->clubVisitaPartido || $todos->clubLocalPartido == $partidos->clubVisitaPartido && $todos->clubVisitaPartido == $partidos->clubLocalPartido ) {
                $partidos_historial[$contador]['local'] =$todos->clubLocalPartido;
                $partidos_historial[$contador]['visita'] =$todos->clubVisitaPartido;
                $partidos_historial[$contador]['goles_local'] =$todos->golesLocalPartido;
                $partidos_historial[$contador]['goles_visita'] =$todos->golesVisitaPartido;
                $contador = $contador + 1;
            }
            # code...
        }
        $contador = $contador;
        $jugadores = Jugador::all();
        $trayectoriasjugadores = TrayectoriaJugador::all();
        $historiales = DB::table('Historiales')->get();

       // dd($partidos);
        //$jugadorHistorial = $historiales['idJugador'];


        $jugadorclublocal = DB::table('Jugadores')
                    ->join('Partidos', 'Partidos.clubLocalPartido','=','Jugadores.idClub')
                    ->get();
               // dd($jugadorclublocal);

        $jugadorclubvisita = DB::table('Jugadores')
                    ->join('Partidos', 'Partidos.clubVisitaPartido','=','Jugadores.idClub')
                    ->get();
       
        $jugador_partido =DB::table('Jugadores')
                        ->join('TrayectoriasJugadores', 'TrayectoriasJugadores.idJugador', '=','Jugadores.idJugador')


                        ->get();


        $plantilla = DB::table('Historiales')
                    ->join('Jugadores', 'Historiales.idJugador','=','Jugadores.idJugador')
                    ->join('Partidos', 'Historiales.idPartido', '=', 'Partidos.idPartido')
                    ->join('TrayectoriasJugadores', 'Jugadores.idJugador', '=', 'TrayectoriasJugadores.idJugador')
                    ->get();
                    //sdd($plantilla);


                     #   dd($jugador_partido);


         return view('partido.show',['contador'=>$contador,'partidos_historial'=>$partidos_historial,'todospartidos' => $todospartidos, 'paises' => $paises,'arbitros' => $arbitros, 'partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos, 'id' => $id, 'estadios' => $estadios, 'jugadores' => $jugadores, 'trayectoriasjugadores' => $trayectoriasjugadores, 'historiales' => $historiales, 'jugador_partido' => $jugador_partido, 'jugadorclublocal' => $jugadorclublocal, 'jugadorclubvisita' => $jugadorclubvisita, 'plantilla' => $plantilla]);
                
    }

//---------------------FUNCION BUSCADOR----------------------------------------------------------------------------
    public function buscador($id)
    {   

        $partidos = Partido::findOrFail($id);
       
        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();
        $arbitros=Arbitro::all();
        dd(1);
        return view('partido.indexbuscador',  ['partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos, 'fecha' =>$fecha]);
                
    }

//---------------------------------Funcion que retorna las variables para el edit--------------------------------    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $partidos = Partido::findOrFail($id);
        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();
        $arbitros=Arbitro::all();
        
        return view('partido.edit', ['partidos' => $partidos,'asociaciones' => $asociaciones, 'ciudades' => $ciudades, 'clubes' => $clubes, 'estadios' => $estadios, 'paises' => $paises, 'torneos' => $torneos, 'arbitros' => $arbitros]);
    }
//-------------------------------------------------------------------------------------------------------------------



//---------------------Funcion actualizar un dato-------------------------------------------------------------------
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $partido = Partido::findOrFail($id);
        
        $partido->clubLocalPartido = $request->input('clubLocalPartido');
        $partido->clubVisitaPartido = $request->input('clubVisitaPartido');
        $partido->fechaPartido = $request->input('fechaPartido');
        $partido->horaPartido = $request->input('horaPartido');
        $partido->jornadaPartido = $request->input('jornadaPartido');
        $partido->idEstadio = $request->input('idEstadio');
        $partido->idArbitroCentral = $request->input('idArbitroCentral');
        $partido->idTorneo = $request->input('idTorneo');        
        $partido->TipoPartido = $request->input('TipoPartido');
        $partido->golesVisitaPartido = $request->input('golesVisitaPartido');
        $partido->golesLocalPartido = $request->input('golesLocalPartido');
        $partido->estadoPartido = $request->input('estadoPartido');
        $partido->idArbitroAsistente1 = $request->input('idArbitroAsistente1');
        $partido->idArbitroAsistente2 = $request->input('idArbitroAsistente2');
        $partido->idCuartoArbitro = $request->input('idCuartoArbitro');
  
        $partido->update();

        return Redirect::to('partido');
    }
//-------------------------------------------------------------------------------------------------------------------


//-------------------Funcion para eliminar (borrado fisico)------------------------------------------------------- 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {   
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $partidos = Partido::find($id);
        $partidos->delete();

        return Redirect::to('partido');
    }


//------------FUNCION PARA AGREGAR JUGADORES A PLANTILLA DE PARTIDO.INDEX-----------
    


    public function plantillacreate(Request $request)
    {   
        $request->user()->authorizeRoles('user'); //Se valida que el usuario que verá estos datos sea de tipo user

        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();
        $arbitros=Arbitro::all();

        return view('partido.plantillacreate', ['asociaciones' => $asociaciones->toArray(), 'ciudades' => $ciudades->toArray(), 'clubes' => $clubes->toArray(), 'estadios' => $estadios->toArray(), 'paises' => $paises->toArray(), 'torneos' => $torneos->toArray(), 'arbitros' => $arbitros->toArray()]);
    }


    public function editplantilla (Request $request, $id){
        $request->user()->authorizeRoles('admin');
    }




    public function updateplantilla(Request $request, $id)
    {   
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $partido = Partido::findOrFail($id);
        
        $partido->clubLocalPartido = $request->input('clubLocalPartido');
        $partido->clubVisitaPartido = $request->input('clubVisitaPartido');
        $partido->fechaPartido = $request->input('fechaPartido');
        $partido->horaPartido = $request->input('horaPartido');
        $partido->jornadaPartido = $request->input('jornadaPartido');
        $partido->idEstadio = $request->input('idEstadio');
        $partido->idArbitroCentral = $request->input('idArbitroCentral');
        $partido->idTorneo = $request->input('idTorneo');        
        $partido->TipoPartido = $request->input('TipoPartido');
        $partido->golesVisitaPartido = $request->input('golesVisitaPartido');
        $partido->golesLocalPartido = $request->input('golesLocalPartido');
        $partido->estadoPartido = $request->input('estadoPartido');
        $partido->idArbitroAsistente1 = $request->input('idArbitroAsistente1');
        $partido->idArbitroAsistente2 = $request->input('idArbitroAsistente2');
        $partido->idCuartoArbitro = $request->input('idCuartoArbitro');
  
        $partido->update();

        return Redirect::to('partido');
    }
}
