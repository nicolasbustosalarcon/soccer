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
       //dd($jugadorclub);

        $jugadorclublocal = DB::table('Clubes')
                        ->join('Jugadores','Clubes.idClub','=','Jugadores.idClub')
                        ->join('Partidos','Clubes.idClub', '=','Partidos.clubLocalPartido')                    
                        ->get();
       //dd($jugadorclublocal);


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

    //LOCAL------------------------------------------------------------
        //Arquero//
        $historial0 = new Historial();
        $historial0->idPartido = $request->input('idPartido');
        $historial0->idJugador = $request->input('idJugador0');
        $historial0->golJugador = $request->input('golJugador');   
        $historial0->amarillaJugador = $request->input('amarillaJugador');     
        $historial0->rojaJugador = $request->input('rojaJugador');
        $historial0->minutosJugador = $request->input('minutosJugador');
        $historial0->Titular = $request->input('Titular0');


        
        $historial0->save();

        //defensas 
        $historial1 = new Historial();
        $historial1->idPartido = $request->input('idPartido');
        $historial1->idJugador = $request->input('idJugador1');
        $historial1->golJugador = $request->input('golJugador');   
        $historial1->amarillaJugador = $request->input('amarillaJugador');     
        $historial1->rojaJugador = $request->input('rojaJugador');
        $historial1->minutosJugador = $request->input('minutosJugador');
        $historial1->Titular = $request->input('Titular1');


        
        $historial1->save();

        $historial2 = new Historial();
        $historial2->idPartido = $request->input('idPartido');
        $historial2->idJugador = $request->input('idJugador2');
        $historial2->golJugador = $request->input('golJugador');   
        $historial2->amarillaJugador = $request->input('amarillaJugador');     
        $historial2->rojaJugador = $request->input('rojaJugador');
        $historial2->minutosJugador = $request->input('minutosJugador');
        $historial2->Titular = $request->input('Titular2');


        
        $historial2->save();

        $historial3 = new Historial();
        $historial3->idPartido = $request->input('idPartido');
        $historial3->idJugador = $request->input('idJugador3');
        $historial3->golJugador = $request->input('golJugador');   
        $historial3->amarillaJugador = $request->input('amarillaJugador');     
        $historial3->rojaJugador = $request->input('rojaJugador');
        $historial3->minutosJugador = $request->input('minutosJugador');
        $historial3->Titular = $request->input('Titular3');


        
        $historial3->save();

        $historial4 = new Historial();
        $historial4->idPartido = $request->input('idPartido');
        $historial4->idJugador = $request->input('idJugador4');
        $historial4->golJugador = $request->input('golJugador');   
        $historial4->amarillaJugador = $request->input('amarillaJugador');     
        $historial4->rojaJugador = $request->input('rojaJugador');
        $historial4->minutosJugador = $request->input('minutosJugador');
        $historial4->Titular = $request->input('Titular4');


        
        $historial4->save();

        $historial5 = new Historial();
        $historial5->idPartido = $request->input('idPartido');
        $historial5->idJugador = $request->input('idJugador5');
        $historial5->golJugador = $request->input('golJugador');   
        $historial5->amarillaJugador = $request->input('amarillaJugador');     
        $historial5->rojaJugador = $request->input('rojaJugador');
        $historial5->minutosJugador = $request->input('minutosJugador');
        $historial5->Titular = $request->input('Titular5');


        
        $historial5->save();

        //Mediocampista
        $historial6 = new Historial();
        $historial6->idPartido = $request->input('idPartido');
        $historial6->idJugador = $request->input('idJugador6');
        $historial6->golJugador = $request->input('golJugador');   
        $historial6->amarillaJugador = $request->input('amarillaJugador');     
        $historial6->rojaJugador = $request->input('rojaJugador');
        $historial6->minutosJugador = $request->input('minutosJugador');
        $historial6->Titular = $request->input('Titular6');

        
        $historial6->save();

        $historial7 = new Historial();
        $historial7->idPartido = $request->input('idPartido');
        $historial7->idJugador = $request->input('idJugador7');
        $historial7->golJugador = $request->input('golJugador');   
        $historial7->amarillaJugador = $request->input('amarillaJugador');     
        $historial7->rojaJugador = $request->input('rojaJugador');
        $historial7->minutosJugador = $request->input('minutosJugador');
        $historial7->Titular = $request->input('Titular7');

        
        $historial7->save();

        $historial8 = new Historial();
        $historial8->idPartido = $request->input('idPartido');
        $historial8->idJugador = $request->input('idJugador8');
        $historial8->golJugador = $request->input('golJugador');   
        $historial8->amarillaJugador = $request->input('amarillaJugador');     
        $historial8->rojaJugador = $request->input('rojaJugador');
        $historial8->minutosJugador = $request->input('minutosJugador');
        $historial8->Titular = $request->input('Titular8');

        
        $historial8->save();

        $historial9 = new Historial();
        $historial9->idPartido = $request->input('idPartido');
        $historial9->idJugador = $request->input('idJugador9');
        $historial9->golJugador = $request->input('golJugador');   
        $historial9->amarillaJugador = $request->input('amarillaJugador');     
        $historial9->rojaJugador = $request->input('rojaJugador');
        $historial9->minutosJugador = $request->input('minutosJugador');
        $historial9->Titular = $request->input('Titular9');

        
        $historial9->save();

        $historial10 = new Historial();
        $historial10->idPartido = $request->input('idPartido');
        $historial10->idJugador = $request->input('idJugador10');
        $historial10->golJugador = $request->input('golJugador');   
        $historial10->amarillaJugador = $request->input('amarillaJugador');     
        $historial10->rojaJugador = $request->input('rojaJugador');
        $historial10->minutosJugador = $request->input('minutosJugador');
        $historial10->Titular = $request->input('Titular10');

        
        $historial10->save();

        //Delantero
        $historial11 = new Historial();
        $historial11->idPartido = $request->input('idPartido');
        $historial11->idJugador = $request->input('idJugador11');
        $historial11->golJugador = $request->input('golJugador');   
        $historial11->amarillaJugador = $request->input('amarillaJugador');     
        $historial11->rojaJugador = $request->input('rojaJugador');
        $historial11->minutosJugador = $request->input('minutosJugador');
        $historial11->Titular = $request->input('Titular11');

        
        $historial11->save();

        $historial12 = new Historial();
        $historial12->idPartido = $request->input('idPartido');
        $historial12->idJugador = $request->input('idJugador12');
        $historial12->golJugador = $request->input('golJugador');   
        $historial12->amarillaJugador = $request->input('amarillaJugador');     
        $historial12->rojaJugador = $request->input('rojaJugador');
        $historial12->minutosJugador = $request->input('minutosJugador');
        $historial12->Titular = $request->input('Titular12');

        
        $historial12->save();

        $historial13 = new Historial();
        $historial13->idPartido = $request->input('idPartido');
        $historial13->idJugador = $request->input('idJugador13');
        $historial13->golJugador = $request->input('golJugador');   
        $historial13->amarillaJugador = $request->input('amarillaJugador');     
        $historial13->rojaJugador = $request->input('rojaJugador');
        $historial13->minutosJugador = $request->input('minutosJugador');
        $historial13->Titular = $request->input('Titular13');

        
        $historial13->save();

        //-------------------------------------------------

        //VISITA-------------------------------------------
        //Arquero//
        $historial14 = new Historial();
        $historial14->idPartido = $request->input('idPartido');
        $historial14->idJugador = $request->input('idJugador14');
        $historial14->golJugador = $request->input('golJugador');   
        $historial14->amarillaJugador = $request->input('amarillaJugador');     
        $historial14->rojaJugador = $request->input('rojaJugador');
        $historial14->minutosJugador = $request->input('minutosJugador');
        $historial14->Titular = $request->input('Titular14');


        
        $historial14->save();

        //defensas 
        $historial15 = new Historial();
        $historial15->idPartido = $request->input('idPartido');
        $historial15->idJugador = $request->input('idJugador15');
        $historial15->golJugador = $request->input('golJugador');   
        $historial15->amarillaJugador = $request->input('amarillaJugador');     
        $historial15->rojaJugador = $request->input('rojaJugador');
        $historial15->minutosJugador = $request->input('minutosJugador');
        $historial15->Titular = $request->input('Titular15');


        
        $historial15->save();

        $historial16 = new Historial();
        $historial16->idPartido = $request->input('idPartido');
        $historial16->idJugador = $request->input('idJugador16');
        $historial16->golJugador = $request->input('golJugador');   
        $historial16->amarillaJugador = $request->input('amarillaJugador');     
        $historial16->rojaJugador = $request->input('rojaJugador');
        $historial16->minutosJugador = $request->input('minutosJugador');
        $historial16->Titular = $request->input('Titular16');


        
        $historial16->save();

        $historial17 = new Historial();
        $historial17->idPartido = $request->input('idPartido');
        $historial17->idJugador = $request->input('idJugador17');
        $historial17->golJugador = $request->input('golJugador');   
        $historial17->amarillaJugador = $request->input('amarillaJugador');     
        $historial17->rojaJugador = $request->input('rojaJugador');
        $historial17->minutosJugador = $request->input('minutosJugador');
        $historial17->Titular = $request->input('Titular17');


        
        $historial17->save();

        $historial18 = new Historial();
        $historial18->idPartido = $request->input('idPartido');
        $historial18->idJugador = $request->input('idJugador18');
        $historial18->golJugador = $request->input('golJugador');   
        $historial18->amarillaJugador = $request->input('amarillaJugador');     
        $historial18->rojaJugador = $request->input('rojaJugador');
        $historial18->minutosJugador = $request->input('minutosJugador');
        $historial18->Titular = $request->input('Titular18');


        
        $historial18->save();

        $historial19 = new Historial();
        $historial19->idPartido = $request->input('idPartido');
        $historial19->idJugador = $request->input('idJugador19');
        $historial19->golJugador = $request->input('golJugador');   
        $historial19->amarillaJugador = $request->input('amarillaJugador');     
        $historial19->rojaJugador = $request->input('rojaJugador');
        $historial19->minutosJugador = $request->input('minutosJugador');
        $historial19->Titular = $request->input('Titular19');


        
        $historial19->save();

        //Mediocampista
        $historial20 = new Historial();
        $historial20->idPartido = $request->input('idPartido');
        $historial20->idJugador = $request->input('idJugador20');
        $historial20->golJugador = $request->input('golJugador');   
        $historial20->amarillaJugador = $request->input('amarillaJugador');     
        $historial20->rojaJugador = $request->input('rojaJugador');
        $historial20->minutosJugador = $request->input('minutosJugador');
        $historial20->Titular = $request->input('Titular20');

        
        $historial20->save();

        $historial21 = new Historial();
        $historial21->idPartido = $request->input('idPartido');
        $historial21->idJugador = $request->input('idJugador21');
        $historial21->golJugador = $request->input('golJugador');   
        $historial21->amarillaJugador = $request->input('amarillaJugador');     
        $historial21->rojaJugador = $request->input('rojaJugador');
        $historial21->minutosJugador = $request->input('minutosJugador');
        $historial21->Titular = $request->input('Titular21');

        
        $historial21->save();

        $historial22 = new Historial();
        $historial22->idPartido = $request->input('idPartido');
        $historial22->idJugador = $request->input('idJugador22');
        $historial22->golJugador = $request->input('golJugador');   
        $historial22->amarillaJugador = $request->input('amarillaJugador');     
        $historial22->rojaJugador = $request->input('rojaJugador');
        $historial22->minutosJugador = $request->input('minutosJugador');
        $historial22->Titular = $request->input('Titular22');

        
        $historial22->save();

        $historial23 = new Historial();
        $historial23->idPartido = $request->input('idPartido');
        $historial23->idJugador = $request->input('idJugador23');
        $historial23->golJugador = $request->input('golJugador');   
        $historial23->amarillaJugador = $request->input('amarillaJugador');     
        $historial23->rojaJugador = $request->input('rojaJugador');
        $historial23->minutosJugador = $request->input('minutosJugador');
        $historial23->Titular = $request->input('Titular23');

        
        $historial23->save();

        $historial24 = new Historial();
        $historial24->idPartido = $request->input('idPartido');
        $historial24->idJugador = $request->input('idJugador24');
        $historial24->golJugador = $request->input('golJugador');   
        $historial24->amarillaJugador = $request->input('amarillaJugador');     
        $historial24->rojaJugador = $request->input('rojaJugador');
        $historial24->minutosJugador = $request->input('minutosJugador');
        $historial24->Titular = $request->input('Titular24');

        
        $historial24->save();

        //Delantero
        $historial25 = new Historial();
        $historial25->idPartido = $request->input('idPartido');
        $historial25->idJugador = $request->input('idJugador25');
        $historial25->golJugador = $request->input('golJugador');   
        $historial25->amarillaJugador = $request->input('amarillaJugador');     
        $historial25->rojaJugador = $request->input('rojaJugador');
        $historial25->minutosJugador = $request->input('minutosJugador');
        $historial25->Titular = $request->input('Titular25');

        
        $historial25->save();

        $historial26 = new Historial();
        $historial26->idPartido = $request->input('idPartido');
        $historial26->idJugador = $request->input('idJugador26');
        $historial26->golJugador = $request->input('golJugador');   
        $historial26->amarillaJugador = $request->input('amarillaJugador');     
        $historial26->rojaJugador = $request->input('rojaJugador');
        $historial26->minutosJugador = $request->input('minutosJugador');
        $historial26->Titular = $request->input('Titular26');

        
        $historial26->save();

        $historial27 = new Historial();
        $historial27->idPartido = $request->input('idPartido');
        $historial27->idJugador = $request->input('idJugador27');
        $historial27->golJugador = $request->input('golJugador');   
        $historial27->amarillaJugador = $request->input('amarillaJugador');     
        $historial27->rojaJugador = $request->input('rojaJugador');
        $historial27->minutosJugador = $request->input('minutosJugador');
        $historial27->Titular = $request->input('Titular27');

        
        $historial27->save();


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
       //dd($jugadorclub);

        $jugadorclublocal = DB::table('Clubes')
                        ->join('Jugadores','Clubes.idClub','=','Jugadores.idClub')
                        ->join('Partidos','Clubes.idClub', '=','Partidos.clubLocalPartido')                    
                        ->get();
       //dd($jugadorclublocal);

        return view('historial.edit',['mes' => $mes, 'dia' => $dia, 'partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos, 'id' => $id, 'estadios' => $estadios, 'jugadores' => $jugadores, 'trayectoriasjugadores' => $trayectoriasjugadores, 'historiales' => $historiales, 'jugador_partido' => $jugador_partido, 'jugadorclub' => $jugadorclub]);

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
