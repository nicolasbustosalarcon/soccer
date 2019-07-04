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

    public function index_fechas()
    {
        $partidos = Partido::select()->paginate(4);
        $clubes=Club::all();
        $torneos=Torneo::all(); 
        $month = date("Y-m");
        $data = $this->calendar_month($month);
        $mes = $data['month'];
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        $mes = $data['month'];


        return view('partido.calendario',  ['data' => $data,
        'mes' => $mes,
        'mespanish' => $mespanish, 'partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos]);
    }

    public function index_month($month){

        $partidos = Partido::select()->paginate(4);
        $clubes=Club::all();
        $torneos=Torneo::all(); 
      $data = $this->calendar_month($month);
      $mes = $data['month'];
      // obtener mes en espanol
      $mespanish = $this->spanish_month($mes);
      $mes = $data['month'];
      $info_partidos =  DB::table('partidos')
                        ->select('idPartido', 'clubLocalPartido', 'clubVisitaPartido', 'golesLocalPartido', 'golesVisitaPartido', 'fechaPartido')
                        ->get();


      return view("partido.calendario",[
        'data' => $data,
        'mes' => $mes,
        'mespanish' => $mespanish, 'partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos
      ]);

    }

    public static function calendar_month($month){
      //$mes = date("Y-m");
      $mes = $month;
      //sacar el ultimo de dia del mes
      $daylast =  date("Y-m-d", strtotime("last day of ".$mes));
      //sacar el dia de dia del mes
      $fecha      =  date("Y-m-d", strtotime("first day of ".$mes));
      $daysmonth  =  date("d", strtotime($fecha));
      $montmonth  =  date("m", strtotime($fecha));
      $yearmonth  =  date("Y", strtotime($fecha));
      // sacar el lunes de la primera semana
      $nuevaFecha = mktime(0,0,0,$montmonth,$daysmonth,$yearmonth);
      $diaDeLaSemana = date("w", $nuevaFecha);
      $nuevaFecha = $nuevaFecha - ($diaDeLaSemana*24*3600); //Restar los segundos totales de los dias transcurridos de la semana
      $dateini = date ("Y-m-d",$nuevaFecha);
      //$dateini = date("Y-m-d",strtotime($dateini."+ 1 day"));
      // numero de primer semana del mes
      $semana1 = date("W",strtotime($fecha));
      // numero de ultima semana del mes
      $semana2 = date("W",strtotime($daylast));
      // semana todal del mes
      // en caso si es diciembre
      if (date("m", strtotime($mes))==12) {
          $semana = 5;
      }
      else {
        $semana = ($semana2-$semana1)+1;
      }
      // semana todal del mes
      $datafecha = $dateini;
      $calendario = array();
      $iweek = 0;
      while ($iweek < $semana):
          $iweek++;
          //echo "Semana $iweek <br>";
          //
          $weekdata = [];
          for ($iday=0; $iday < 7 ; $iday++){
            // code...
            $datafecha = date("Y-m-d",strtotime($datafecha."+ 1 day"));
            $datanew['mes'] = date("M", strtotime($datafecha));
            $datanew['dia'] = date("d", strtotime($datafecha));
            $datanew['fecha'] = $datafecha;
            //AGREGAR CONSULTAS EVENTO
            //+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
            array_push($weekdata,$datanew);
          }
          $dataweek['semana'] = $iweek;
          $dataweek['datos'] = $weekdata;
          //$datafecha['horario'] = $datahorario;
          array_push($calendario,$dataweek);
      endwhile;
      $nextmonth = date("Y-M",strtotime($mes."+ 1 month"));
      $lastmonth = date("Y-M",strtotime($mes."- 1 month"));
      $month = date("M",strtotime($mes));
      $yearmonth = date("Y",strtotime($mes));
      //$month = date("M",strtotime("2019-03"));
      $data = array(
        'next' => $nextmonth,
        'month'=> $month,
        'year' => $yearmonth,
        'last' => $lastmonth,
        'calendar' => $calendario,
      );
      return $data;
    }

    public static function spanish_month($month)
    {

        $mes = $month;
        if ($month=="Jan") {
          $mes = "Enero";
        }
        elseif ($month=="Feb")  {
          $mes = "Febrero";
        }
        elseif ($month=="Mar")  {
          $mes = "Marzo";
        }
        elseif ($month=="Apr") {
          $mes = "Abril";
        }
        elseif ($month=="May") {
          $mes = "Mayo";
        }
        elseif ($month=="Jun") {
          $mes = "Junio";
        }
        elseif ($month=="Jul") {
          $mes = "Julio";
        }
        elseif ($month=="Aug") {
          $mes = "Agosto";
        }
        elseif ($month=="Sep") {
          $mes = "Septiembre";
        }
        elseif ($month=="Oct") {
          $mes = "Octubre";
        }
        elseif ($month=="Oct") {
          $mes = "December";
        }
        elseif ($month=="Dec") {
          $mes = "Diciembre";
        }
        else {
          $mes = $month;
        }
        return $mes;
    }



    public function fechas($anho, $month, $dia)
    {
        $partidos = Partido::select()->paginate(4);
        $clubes=Club::all();
        $torneos=Torneo::all();
        //dd($month);        
        $data = $this->calendar_month($month);
        //dd($data);
        $mes = $data['month'];
        //dd($mes);
        // obtener mes en espanol
        $mespanish = $this->spanish_month($mes);
        //dd($mespanish);
        $mes = $data['month'];
        //dd($mes);
        $hoy = "$anho"."-"."$mes"."-"."$dia";
        $hoy = date("Y-m-d", strtotime($hoy));
        //dd($fecha);
        //dd($hoy);
        $listado =  DB::table('partidos')
                    ->select('idPartido', 'clubLocalPartido', 'clubVisitaPartido', 'golesLocalPartido', 'golesVisitaPartido')
                    ->where('partidos.fechaPartido', '=', $hoy)
                    ->get();
        //dd($fecha);
        $partidos->withPath('custom/url');
        
        return view('partido.fecha',['data' => $data, 'mes' => $mes, 'mespanish' => $mespanish,'partidos' => $partidos, 'hoy' => $hoy, 'clubes' => $clubes, 'listado' => $listado, 'torneos' => $torneos]);
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
        $partido->leido = 0;
        
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
                    ->join('TrayectoriasJugadores', 'Jugadores.idJugador', '=', 'TrayectoriasJugadores.idJugador')
                    ->get();
                    //sdd($plantilla);
                     #   dd($jugador_partido);


         return view('partido.show',['contador2'=>$contador2,'gol_jugador'=>$gol_jugador,'contador'=>$contador,'partidos_historial'=>$partidos_historial,'todospartidos' => $todospartidos, 'paises' => $paises,'arbitros' => $arbitros, 'partidos' => $partidos, 'clubes' => $clubes, 'torneos' => $torneos, 'id' => $id, 'estadios' => $estadios, 'jugadores' => $jugadores, 'trayectoriasjugadores' => $trayectoriasjugadores, 'historiales' => $historiales, 'jugador_partido' => $jugador_partido, 'jugadorclublocal' => $jugadorclublocal, 'jugadorclubvisita' => $jugadorclubvisita, 'plantilla' => $plantilla, 'mes' => $mes, 'dia' => $dia]);
                
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