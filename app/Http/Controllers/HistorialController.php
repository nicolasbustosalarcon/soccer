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
        $historial0->golJugador = $request->input('golJugador0');   
        $historial0->amarillaJugador = $request->input('amarillaJugador0');     
        $historial0->rojaJugador = $request->input('rojaJugador0');
        $historial0->minutosJugador = $request->input('minutosJugador0');
        $historial0->Titular = $request->input('Titular0');


        
        $historial0->save();

        //defensas 
        $historial1 = new Historial();
        $historial1->idPartido = $request->input('idPartido');
        $historial1->idJugador = $request->input('idJugador1');
        $historial1->golJugador = $request->input('golJugador1');   
        $historial1->amarillaJugador = $request->input('amarillaJugador1');     
        $historial1->rojaJugador = $request->input('rojaJugador1');
        $historial1->minutosJugador = $request->input('minutosJugador1');
        $historial1->Titular = $request->input('Titular1');


        
        $historial1->save();

        $historial2 = new Historial();
        $historial2->idPartido = $request->input('idPartido');
        $historial2->idJugador = $request->input('idJugador2');
        $historial2->golJugador = $request->input('golJugador2');   
        $historial2->amarillaJugador = $request->input('amarillaJugador2');     
        $historial2->rojaJugador = $request->input('rojaJugador2');
        $historial2->minutosJugador = $request->input('minutosJugador2');
        $historial2->Titular = $request->input('Titular2');


        
        $historial2->save();

        $historial3 = new Historial();
        $historial3->idPartido = $request->input('idPartido');
        $historial3->idJugador = $request->input('idJugador3');
        $historial3->golJugador = $request->input('golJugador3');   
        $historial3->amarillaJugador = $request->input('amarillaJugador3');     
        $historial3->rojaJugador = $request->input('rojaJugador3');
        $historial3->minutosJugador = $request->input('minutosJugador3');
        $historial3->Titular = $request->input('Titular3');


        
        $historial3->save();

        $historial4 = new Historial();
        $historial4->idPartido = $request->input('idPartido');
        $historial4->idJugador = $request->input('idJugador4');
        $historial4->golJugador = $request->input('golJugador4');   
        $historial4->amarillaJugador = $request->input('amarillaJugador4');     
        $historial4->rojaJugador = $request->input('rojaJugador4');
        $historial4->minutosJugador = $request->input('minutosJugador4');
        $historial4->Titular = $request->input('Titular4');


        
        $historial4->save();

        $historial5 = new Historial();
        $historial5->idPartido = $request->input('idPartido');
        $historial5->idJugador = $request->input('idJugador5');
        $historial5->golJugador = $request->input('golJugador5');   
        $historial5->amarillaJugador = $request->input('amarillaJugador5');     
        $historial5->rojaJugador = $request->input('rojaJugador5');
        $historial5->minutosJugador = $request->input('minutosJugador5');
        $historial5->Titular = $request->input('Titular5');


        
        $historial5->save();

        //Mediocampista
        $historial6 = new Historial();
        $historial6->idPartido = $request->input('idPartido');
        $historial6->idJugador = $request->input('idJugador6');
        $historial6->golJugador = $request->input('golJugador6');   
        $historial6->amarillaJugador = $request->input('amarillaJugador6');     
        $historial6->rojaJugador = $request->input('rojaJugador6');
        $historial6->minutosJugador = $request->input('minutosJugador6');
        $historial6->Titular = $request->input('Titular6');

        
        $historial6->save();

        $historial7 = new Historial();
        $historial7->idPartido = $request->input('idPartido');
        $historial7->idJugador = $request->input('idJugador7');
        $historial7->golJugador = $request->input('golJugador7');   
        $historial7->amarillaJugador = $request->input('amarillaJugador7');     
        $historial7->rojaJugador = $request->input('rojaJugador7');
        $historial7->minutosJugador = $request->input('minutosJugador7');
        $historial7->Titular = $request->input('Titular7');

        
        $historial7->save();

        $historial8 = new Historial();
        $historial8->idPartido = $request->input('idPartido');
        $historial8->idJugador = $request->input('idJugador8');
        $historial8->golJugador = $request->input('golJugador8');   
        $historial8->amarillaJugador = $request->input('amarillaJugador8');     
        $historial8->rojaJugador = $request->input('rojaJugador8');
        $historial8->minutosJugador = $request->input('minutosJugador8');
        $historial8->Titular = $request->input('Titular8');

        
        $historial8->save();

        $historial9 = new Historial();
        $historial9->idPartido = $request->input('idPartido');
        $historial9->idJugador = $request->input('idJugador9');
        $historial9->golJugador = $request->input('golJugador9');   
        $historial9->amarillaJugador = $request->input('amarillaJugador9');     
        $historial9->rojaJugador = $request->input('rojaJugador9');
        $historial9->minutosJugador = $request->input('minutosJugador9');
        $historial9->Titular = $request->input('Titular9');

        
        $historial9->save();

        $historial10 = new Historial();
        $historial10->idPartido = $request->input('idPartido');
        $historial10->idJugador = $request->input('idJugador10');
        $historial10->golJugador = $request->input('golJugador10');   
        $historial10->amarillaJugador = $request->input('amarillaJugador10');     
        $historial10->rojaJugador = $request->input('rojaJugador10');
        $historial10->minutosJugador = $request->input('minutosJugador10');
        $historial10->Titular = $request->input('Titular10');

        
        $historial10->save();

        //Delantero
        $historial11 = new Historial();
        $historial11->idPartido = $request->input('idPartido');
        $historial11->idJugador = $request->input('idJugador11');
        $historial11->golJugador = $request->input('golJugador11');   
        $historial11->amarillaJugador = $request->input('amarillaJugador11');     
        $historial11->rojaJugador = $request->input('rojaJugador11');
        $historial11->minutosJugador = $request->input('minutosJugador11');
        $historial11->Titular = $request->input('Titular11');

        
        $historial11->save();

        $historial12 = new Historial();
        $historial12->idPartido = $request->input('idPartido');
        $historial12->idJugador = $request->input('idJugador12');
        $historial12->golJugador = $request->input('golJugador12');   
        $historial12->amarillaJugador = $request->input('amarillaJugador12');     
        $historial12->rojaJugador = $request->input('rojaJugador12');
        $historial12->minutosJugador = $request->input('minutosJugador12');
        $historial12->Titular = $request->input('Titular12');

        
        $historial12->save();

        $historial13 = new Historial();
        $historial13->idPartido = $request->input('idPartido');
        $historial13->idJugador = $request->input('idJugador13');
        $historial13->golJugador = $request->input('golJugador13');   
        $historial13->amarillaJugador = $request->input('amarillaJugador13');     
        $historial13->rojaJugador = $request->input('rojaJugador13');
        $historial13->minutosJugador = $request->input('minutosJugador13');
        $historial13->Titular = $request->input('Titular13');

        
        $historial13->save();

        //-------------------------------------------------

        //VISITA-------------------------------------------
        //Arquero//
        $historial14 = new Historial();
        $historial14->idPartido = $request->input('idPartido');
        $historial14->idJugador = $request->input('idJugador14');
        $historial14->golJugador = $request->input('golJugador14');   
        $historial14->amarillaJugador = $request->input('amarillaJugador14');     
        $historial14->rojaJugador = $request->input('rojaJugador14');
        $historial14->minutosJugador = $request->input('minutosJugador14');
        $historial14->Titular = $request->input('Titular14');


        
        $historial14->save();

        //defensas 
        $historial15 = new Historial();
        $historial15->idPartido = $request->input('idPartido');
        $historial15->idJugador = $request->input('idJugador15');
        $historial15->golJugador = $request->input('golJugador15');   
        $historial15->amarillaJugador = $request->input('amarillaJugador15');     
        $historial15->rojaJugador = $request->input('rojaJugador15');
        $historial15->minutosJugador = $request->input('minutosJugador15');
        $historial15->Titular = $request->input('Titular15');


        
        $historial15->save();

        $historial16 = new Historial();
        $historial16->idPartido = $request->input('idPartido');
        $historial16->idJugador = $request->input('idJugador16');
        $historial16->golJugador = $request->input('golJugador16');   
        $historial16->amarillaJugador = $request->input('amarillaJugador16');     
        $historial16->rojaJugador = $request->input('rojaJugador16');
        $historial16->minutosJugador = $request->input('minutosJugador16');
        $historial16->Titular = $request->input('Titular16');


        
        $historial16->save();

        $historial17 = new Historial();
        $historial17->idPartido = $request->input('idPartido');
        $historial17->idJugador = $request->input('idJugador17');
        $historial17->golJugador = $request->input('golJugador17');   
        $historial17->amarillaJugador = $request->input('amarillaJugador17');     
        $historial17->rojaJugador = $request->input('rojaJugador17');
        $historial17->minutosJugador = $request->input('minutosJugador17');
        $historial17->Titular = $request->input('Titular17');


        
        $historial17->save();

        $historial18 = new Historial();
        $historial18->idPartido = $request->input('idPartido');
        $historial18->idJugador = $request->input('idJugador18');
        $historial18->golJugador = $request->input('golJugador18');   
        $historial18->amarillaJugador = $request->input('amarillaJugador18');     
        $historial18->rojaJugador = $request->input('rojaJugador18');
        $historial18->minutosJugador = $request->input('minutosJugador18');
        $historial18->Titular = $request->input('Titular18');


        
        $historial18->save();

        $historial19 = new Historial();
        $historial19->idPartido = $request->input('idPartido');
        $historial19->idJugador = $request->input('idJugador19');
        $historial19->golJugador = $request->input('golJugador19');   
        $historial19->amarillaJugador = $request->input('amarillaJugador19');     
        $historial19->rojaJugador = $request->input('rojaJugador19');
        $historial19->minutosJugador = $request->input('minutosJugador19');
        $historial19->Titular = $request->input('Titular19');


        
        $historial19->save();

        //Mediocampista
        $historial20 = new Historial();
        $historial20->idPartido = $request->input('idPartido');
        $historial20->idJugador = $request->input('idJugador20');
        $historial20->golJugador = $request->input('golJugador20');   
        $historial20->amarillaJugador = $request->input('amarillaJugador20');     
        $historial20->rojaJugador = $request->input('rojaJugador20');
        $historial20->minutosJugador = $request->input('minutosJugador20');
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
        $historial22->golJugador = $request->input('golJugador22');   
        $historial22->amarillaJugador = $request->input('amarillaJugador22');     
        $historial22->rojaJugador = $request->input('rojaJugador22');
        $historial22->minutosJugador = $request->input('minutosJugador22');
        $historial22->Titular = $request->input('Titular22');

        
        $historial22->save();

        $historial23 = new Historial();
        $historial23->idPartido = $request->input('idPartido');
        $historial23->idJugador = $request->input('idJugador23');
        $historial23->golJugador = $request->input('golJugador23');   
        $historial23->amarillaJugador = $request->input('amarillaJugador23');     
        $historial23->rojaJugador = $request->input('rojaJugador23');
        $historial23->minutosJugador = $request->input('minutosJugador23');
        $historial23->Titular = $request->input('Titular23');

        
        $historial23->save();

        $historial24 = new Historial();
        $historial24->idPartido = $request->input('idPartido');
        $historial24->idJugador = $request->input('idJugador24');
        $historial24->golJugador = $request->input('golJugador24');   
        $historial24->amarillaJugador = $request->input('amarillaJugador24');     
        $historial24->rojaJugador = $request->input('rojaJugador24');
        $historial24->minutosJugador = $request->input('minutosJugador24');
        $historial24->Titular = $request->input('Titular24');

        
        $historial24->save();

        //Delantero
        $historial25 = new Historial();
        $historial25->idPartido = $request->input('idPartido');
        $historial25->idJugador = $request->input('idJugador25');
        $historial25->golJugador = $request->input('golJugador25');   
        $historial25->amarillaJugador = $request->input('amarillaJugador25');     
        $historial25->rojaJugador = $request->input('rojaJugador25');
        $historial25->minutosJugador = $request->input('minutosJugador25');
        $historial25->Titular = $request->input('Titular25');

        
        $historial25->save();

        $historial26 = new Historial();
        $historial26->idPartido = $request->input('idPartido');
        $historial26->idJugador = $request->input('idJugador26');
        $historial26->golJugador = $request->input('golJugador26');   
        $historial26->amarillaJugador = $request->input('amarillaJugador26');     
        $historial26->rojaJugador = $request->input('rojaJugador26');
        $historial26->minutosJugador = $request->input('minutosJugador26');
        $historial26->Titular = $request->input('Titular26');

        
        $historial26->save();

        $historial27 = new Historial();
        $historial27->idPartido = $request->input('idPartido');
        $historial27->idJugador = $request->input('idJugador27');
        $historial27->golJugador = $request->input('golJugador27');   
        $historial27->amarillaJugador = $request->input('amarillaJugador27');     
        $historial27->rojaJugador = $request->input('rojaJugador27');
        $historial27->minutosJugador = $request->input('minutosJugador27');
        $historial27->Titular = $request->input('Titular27');

        
        $historial27->save();


        return Redirect::to('historial');
    }

    public function create_stats($id)
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
        $mes = date("m");
        $dia = date("d");
        //dd($mes);
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
        $gol_jugador = array(array('jugador', 'apellido', 'club','gol','minutos_jugados'));
        $contador2 = 0;
        foreach ($historial as $his) {
            if ($his->idPartido == $id) {
                foreach ($jugadores as $jug) {
                    if ($his->idJugador == $jug->idJugador) {
                        $gol_jugador[$contador2]['jugador'] = $jug->nombreJugador;//Se le puede mandar solo el id tambien
                        $gol_jugador[$contador2]['apellido'] = $jug->apellidosJugador;
                        $gol_jugador[$contador2]['club'] = $jug->idClub;

                        $gol_jugador[$contador2]['gol'] = $his->golJugador;
                        $gol_jugador[$contador2]['minutos_jugados'] = $his->minutosJugador;
                        $contador2 = $contador2 + 1;
                    }
                }
            }
        }
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
                    ->get();
                    //sdd($plantilla);
                     #   dd($jugador_partido);


         return view('historial.create_stats',['contador2'=>$contador2,'gol_jugador'=>$gol_jugador,'contador'=>$contador,'partidos_historial'=>$partidos_historial,'todospartidos' => $todospartidos, 'paises' => $paises,'arbitros' => $arbitros, 'partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos, 'id' => $id, 'estadios' => $estadios, 'jugadores' => $jugadores, 'trayectoriasjugadores' => $trayectoriasjugadores, 'historiales' => $historiales, 'jugador_partido' => $jugador_partido, 'jugadorclublocal' => $jugadorclublocal, 'jugadorclubvisita' => $jugadorclubvisita, 'plantilla' => $plantilla, 'mes' => $mes, 'dia' => $dia]);
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
