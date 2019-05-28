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

use Carbon\Carbon;

class JugadorController extends Controller
{


//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores = Jugador::all();
        $paises=Pais::all();
        $clubes=Club::all();

        return view('jugador.index', ['paises' => $paises, 'jugadores' => $jugadores, 'clubes' => $clubes]);

    }
//-------------------------------------------------------------------------------------------------------------------


//------Función que retorna las variables para la vista create-------------------------------------------------------
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubes=Club::all();
        $paises=Pais::all();

        return view('jugador.create', ['clubes' => $clubes->toArray(), 'paises' => $paises->toArray()]);
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
        //if($request->hasFile('imagenJugador')){
        //    $file = $request->file('imagenJugador');
        //    $name = time().$file->getClientOriginalName();
        //    $file->move(public_path().'/images/jugador/',$name);
            
            
        //}

        $jugador = new Jugador();
        $jugador->nombreJugador = $request->input('nombreJugador');
        $jugador->apellidosJugador = $request->input('apellidosJugador');
        $anho = $request->input('anho');
        $mes = $request->input('mes');
        $dia = $request->input('dia');
        $jugador->nacimientoJugador = $anho.'-'.$mes.'-'.$dia;
        $jugador->edadJugador= Carbon::createFromDate($anho,$mes,$dia)->age;
        $jugador->posicionJugador = $request->input('posicionJugador');
        $jugador->alturaJugador = $request->input('alturaJugador');
        $jugador->pesoJugador = $request->input('pesoJugador');
        $jugador->pieJugador = $request->input('pieJugador');
        $jugador->idClub = $request->input('idClub');
        $jugador->golesJugador = $request->input('golesJugador');
        $jugador->amarillasJugador = $request->input('amarillasJugador');
        $jugador->rojasJugador = $request->input('rojasJugador');
        $jugador->minutostotalesJugador = $request->input('minutostotalesJugador');        
        //$jugador->imagenJugador = $name;    
        if(Input::hasfile('imagenJugador')){
            $file=Input::file('imagenJugador');
            $file->move(public_path().'/images/jugador/',$file->getClientOriginalName());
            $jugador->imagenJugador=$file->getClientOriginalName();
        }
        $jugador->idPais = $request->input('idPais');        
        
        $jugador->save();

        return Redirect::to('admin');

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
        $jugadores = Jugador::findOrFail($id);
       
        $paises         = Pais::all();
        $clubes         = Club::all();
       $trayectorias    = TrayectoriaJugador::all();
       $torneos         = Torneo::all();
        //dd($trayectorias);

        return view('jugador.show',['clubes' => $clubes, 'paises' => $paises,  'jugadores' => $jugadores, 'trayectorias' => $trayectorias, 'torneos' => $torneos]);
    }



//---------------------------------Funcion que retorna las variables para el edit--------------------------------    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jugadores = Jugador::findOrFail($id);
        $clubes=Club::all();
        $paises=Pais::all();
        $fecha_como_entero = strtotime($jugadores->nacimientoJugador);
        $anho = date("Y", $fecha_como_entero);
        $mes = date("m", $fecha_como_entero);
        $dia = date("d", $fecha_como_entero);
        return view('jugador.edit', ['paises' => $paises, 'jugadores' => $jugadores, 'clubes' => $clubes,'anho' => $anho, 'mes' => $mes, 'dia' => $dia]);
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
        $jugador = Jugador::findOrFail($id);
        $anho = $request->input('anho');
        $mes = $request->input('mes');
        $dia = $request->input('dia');
        $jugador->nombreJugador = $request->input('nombreJugador');
        $jugador->apellidosJugador = $request->input('apellidosJugador');
        $jugador->nacimientoJugador =  $anho.'-'.$mes.'-'.$dia;
        $jugador->edadJugador = Carbon::createFromDate($anho,$mes,$dia)->age;
        $jugador->posicionJugador = $request->input('posicionJugador');
        $jugador->alturaJugador = $request->input('alturaJugador');
        $jugador->pesoJugador = $request->input('pesoJugador');
        $jugador->pieJugador = $request->input('pieJugador');
        $jugador->idClub = $request->input('idClub');
        $jugador->golesJugador = $request->input('golesJugador');
        $jugador->amarillasJugador = $request->input('amarillasJugador');
        $jugador->rojasJugador = $request->input('rojasJugador');
        $jugador->minutostotalesJugador = $request->input('minutostotalesJugador');        
        //$jugador->imagenJugador = $request->input('imagenJugador');
        if(Input::hasfile('imagenJugador')){
            $file=Input::file('imagenJugador');
            $file->move(public_path().'/images/jugador',$file->getClientOriginalName());
            $jugador->imagenJugador=$file->getClientOriginalName();

        }
        $jugador->idPais = $request->input('idPais');        
  
        $jugador->update();

        return Redirect::to('admin');
    }
//-------------------------------------------------------------------------------------------------------------------


//-------------------Funcion para eliminar (borrado fisico)------------------------------------------------------- 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jugadores = Jugador::find($id);
        $jugadores->delete();

        return Redirect::to('admin');
    }
}
