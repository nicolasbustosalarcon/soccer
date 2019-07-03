<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Historial;
use App\Jugador;
use App\Partido;
use App\Club;
use App\Asociacion;
use App\Ciudad;
use App\Estadio;
use App\Pais;
use App\Torneo;
use App\Arbitro;

use App\TrayectoriaJugador;

use DB;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $historiales = Historial::all();
        $jugadores=Jugador::all();
        $partidos=Partido::all();
        
        return view('historial.index',  ['historiales' => $historiales,'partidos' => $partidos, 'jugadores' => $jugadores]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $partidos = Partido::findOrFail($id);
       
        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();
        $arbitros=Arbitro::all();
        $mes = date("m");
        $dia = date("d");


        $jugadores = Jugador::all();
        $trayectoriasjugadores = TrayectoriaJugador::all();
        $historiales = DB::table('Historiales')->get();

       // dd($partidos);
        //$jugadorHistorial = $historiales['idJugador'];

        //  dd($jugadorHistorial);


       
        $jugador_partido =DB::table('Jugadores')
                        ->join('TrayectoriasJugadores', 'TrayectoriasJugadores.idJugador', '=','Jugadores.idJugador')


                        ->get();





                     #   dd($jugador_partido);

        $jugadorclub = DB::table('Clubes')
                        ->join('Jugadores','Clubes.idClub','=','Jugadores.idClub')
                        ->get();
       // dd($jugadorclub);

        $jugadorclublocal = DB::table('Clubes')
                        ->join('Jugadores','Clubes.idClub','=','Jugadores.idClub')
                        ->join('Partidos','Clubes.idClub', '=','Partidos.clubLocalPartido')                    
                        ->get();
       dd($jugadorclublocal);


        return view('historial.create',['mes' => $mes, 'dia' => $dia, 'partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos, 'id' => $id, 'estadios' => $estadios, 'jugadores' => $jugadores, 'trayectoriasjugadores' => $trayectoriasjugadores, 'historiales' => $historiales, 'jugador_partido' => $jugador_partido, 'jugadorclub' => $jugadorclub]);

        /*---------PRUEBA 2----------------
        $jugadores=Jugador::all();
        $clubes=Club::all();
        $partidos=Partido::all();
        $jugadorclublocal = DB::table('Clubes')
                        ->join('Jugadores','Clubes.idClub','=','Jugadores.idClub')
                        ->join('Partidos','Clubes.idClub', '=','Partidos.clubLocalPartido')                    
                        ->get();
       //dd($jugadorclublocal);

        $jugadorclubvisita = DB::table('Clubes')
                        ->join('Jugadores','Clubes.idClub','=','Jugadores.idClub')
                        ->join('Partidos','Clubes.idClub', '=','Partidos.clubVisitaPartido')                    
                        ->get();
        //dd($jugadorclubvisita);
        

        $jugador_partido =DB::table('Jugadores')
                        ->join('TrayectoriasJugadores', 'TrayectoriasJugadores.idJugador', '=','Jugadores.idJugador')


                        ->get();
      //dd($jugador_partido);

        $listalocal = DB::table('Historiales')
                    ->join('Partidos','Historiales.idPartido','=','Partidos.idPartido')
                    ->get();
      // dd($listalocal);

       $partidoclublocal = DB::table('Partidos')//Muestra el club que hizo de local ese partido
                    ->join('Clubes','Clubes.idClub', '=','Partidos.clubLocalPartido')
                    ->get();
     // dd($partidoclublocal);

         $partidoclubvisita = DB::table('Partidos')//Muestra el club que hizo de visita ese partido
                    ->join('Clubes','Clubes.idClub', '=','Partidos.clubVisitaPartido')
                    ->get();
       // dd($partidoclubvisita);


        return view('historial.create', ['partidos' => $partidos, 'jugadores' => $jugadores, 'partidoclublocal' => $partidoclublocal, 'partidoclubvisita' => $partidoclubvisita, 'clubes' => $clubes, 'jugadorclublocal' => $jugadorclublocal,'jugadorclubvisita' => $jugadorclubvisita, 'listalocal' => $listalocal]);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Arquero//
        $historial = new Historial();
        $historial->idPartido = $request->input('idPartido');
        $historial->idJugador = $request->input('idJugador');
        $historial->golJugador = $request->input('golJugador');   
        $historial->amarillaJugador = $request->input('amarillaJugador');     
        $historial->rojaJugador = $request->input('rojaJugador');
        $historial->minutosJugador = $request->input('minutosJugador');

        
        $historial->save();

        //Defensas 
        $historial1 = new Historial();
        $historial1->idPartido = $request->input('idPartido');
        $historial1->idJugador = $request->input('idJugador1');
        $historial1->golJugador = $request->input('golJugador');   
        $historial1->amarillaJugador = $request->input('amarillaJugador');     
        $historial1->rojaJugador = $request->input('rojaJugador');
        $historial1->minutosJugador = $request->input('minutosJugador');

        
        $historial1->save();

        $historial2 = new Historial();
        $historial2->idPartido = $request->input('idPartido');
        $historial2->idJugador = $request->input('idJugador2');
        $historial2->golJugador = $request->input('golJugador');   
        $historial2->amarillaJugador = $request->input('amarillaJugador');     
        $historial2->rojaJugador = $request->input('rojaJugador');
        $historial2->minutosJugador = $request->input('minutosJugador');

        
        $historial2->save();

        $historial3 = new Historial();
        $historial3->idPartido = $request->input('idPartido');
        $historial3->idJugador = $request->input('idJugador3');
        $historial3->golJugador = $request->input('golJugador');   
        $historial3->amarillaJugador = $request->input('amarillaJugador');     
        $historial3->rojaJugador = $request->input('rojaJugador');
        $historial3->minutosJugador = $request->input('minutosJugador');

        
        $historial3->save();

        $historial4 = new Historial();
        $historial4->idPartido = $request->input('idPartido');
        $historial4->idJugador = $request->input('idJugador4');
        $historial4->golJugador = $request->input('golJugador');   
        $historial4->amarillaJugador = $request->input('amarillaJugador');     
        $historial4->rojaJugador = $request->input('rojaJugador');
        $historial4->minutosJugador = $request->input('minutosJugador');

        
        $historial4->save();

        $historial5 = new Historial();
        $historial5->idPartido = $request->input('idPartido');
        $historial5->idJugador = $request->input('idJugador5');
        $historial5->golJugador = $request->input('golJugador');   
        $historial5->amarillaJugador = $request->input('amarillaJugador');     
        $historial5->rojaJugador = $request->input('rojaJugador');
        $historial5->minutosJugador = $request->input('minutosJugador');

        
        $historial5->save();

        //Mediocampista
        $historial6 = new Historial();
        $historial6->idPartido = $request->input('idPartido');
        $historial6->idJugador = $request->input('idJugador6');
        $historial6->golJugador = $request->input('golJugador');   
        $historial6->amarillaJugador = $request->input('amarillaJugador');     
        $historial6->rojaJugador = $request->input('rojaJugador');
        $historial6->minutosJugador = $request->input('minutosJugador');

        
        $historial6->save();

        $historial7 = new Historial();
        $historial7->idPartido = $request->input('idPartido');
        $historial7->idJugador = $request->input('idJugador7');
        $historial7->golJugador = $request->input('golJugador');   
        $historial7->amarillaJugador = $request->input('amarillaJugador');     
        $historial7->rojaJugador = $request->input('rojaJugador');
        $historial7->minutosJugador = $request->input('minutosJugador');

        
        $historial7->save();

        $historial8 = new Historial();
        $historial8->idPartido = $request->input('idPartido');
        $historial8->idJugador = $request->input('idJugador8');
        $historial8->golJugador = $request->input('golJugador');   
        $historial8->amarillaJugador = $request->input('amarillaJugador');     
        $historial8->rojaJugador = $request->input('rojaJugador');
        $historial8->minutosJugador = $request->input('minutosJugador');

        
        $historial8->save();

        $historial9 = new Historial();
        $historial9->idPartido = $request->input('idPartido');
        $historial9->idJugador = $request->input('idJugador9');
        $historial9->golJugador = $request->input('golJugador');   
        $historial9->amarillaJugador = $request->input('amarillaJugador');     
        $historial9->rojaJugador = $request->input('rojaJugador');
        $historial9->minutosJugador = $request->input('minutosJugador');

        
        $historial9->save();

        $historial10 = new Historial();
        $historial10->idPartido = $request->input('idPartido');
        $historial10->idJugador = $request->input('idJugador10');
        $historial10->golJugador = $request->input('golJugador');   
        $historial10->amarillaJugador = $request->input('amarillaJugador');     
        $historial10->rojaJugador = $request->input('rojaJugador');
        $historial10->minutosJugador = $request->input('minutosJugador');

        
        $historial10->save();

        //Delantero
        $historial11 = new Historial();
        $historial11->idPartido = $request->input('idPartido');
        $historial11->idJugador = $request->input('idJugador11');
        $historial11->golJugador = $request->input('golJugador');   
        $historial11->amarillaJugador = $request->input('amarillaJugador');     
        $historial11->rojaJugador = $request->input('rojaJugador');
        $historial11->minutosJugador = $request->input('minutosJugador');

        
        $historial11->save();

        $historial12 = new Historial();
        $historial12->idPartido = $request->input('idPartido');
        $historial12->idJugador = $request->input('idJugador12');
        $historial12->golJugador = $request->input('golJugador');   
        $historial12->amarillaJugador = $request->input('amarillaJugador');     
        $historial12->rojaJugador = $request->input('rojaJugador');
        $historial12->minutosJugador = $request->input('minutosJugador');

        
        $historial12->save();

        $historial13 = new Historial();
        $historial13->idPartido = $request->input('idPartido');
        $historial13->idJugador = $request->input('idJugador13');
        $historial13->golJugador = $request->input('golJugador');   
        $historial13->amarillaJugador = $request->input('amarillaJugador');     
        $historial13->rojaJugador = $request->input('rojaJugador');
        $historial13->minutosJugador = $request->input('minutosJugador');

        
        $historial13->save();



        return Redirect::to('historial');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
