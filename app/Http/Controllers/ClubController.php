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






class ClubController extends Controller
{

//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clubes = Club::orderBy('idPais', 'ASC')->paginate(1000);
        $paises = Pais::all();
        $asociaciones = Asociacion::all();
        $torneos = Torneo::all();
        return view('club.index')->with(['clubes'=> $clubes, 'paises' => $paises, 'asociaciones' => $asociaciones, 'torneos' => $torneos]);

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
        $asociaciones=Asociacion::all();
        $directorestecnicos=DirectorTecnico::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();
        

        return view('club.create', ['asociaciones' => $asociaciones->toArray(), 'ciudades' => $ciudades->toArray(), 'directorestecnicos' => $directorestecnicos->toArray(), 'estadios' => $estadios->toArray(), 'paises' => $paises->toArray(),  'torneos' => $torneos->toArray()]);
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

        $club = new Club();
        $club->nombreClub = $request->input('nombreClub');
        if(Input::hasfile('imagenClub')){
            $file=Input::file('imagenClub');
            $file->move(public_path().'/images/club/',$file->getClientOriginalName());
            $club->imagenClub=$file->getClientOriginalName();
        }
        $club->fundacionClub = $request->input('fundacionClub');
        $club->sedeClub = $request->input('sedeClub');
        $club->idCiudad = $request->input('idCiudad');
        $club->idPais = $request->input('idPais');        
        $club->correoClub = $request->input('correoClub');
        $club->telefonoClub = $request->input('telefonoClub');
        $club->idAsociacion = $request->input('idAsociacion');
        $club->idDirectorTecnico = $request->input('idDirectorTecnico');
        $club->idEstadio = $request->input('idEstadio');
        $club->idTorneo = $request->input('idTorneo');
        $club->save();

        return Redirect::to('admin');


        
        
        
        //return $request->all();
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
        $clubes = Club::findOrFail($id);
       
        $paises = Pais::all();
        $asociaciones = Asociacion::all();
        $torneos = Torneo::all();
        $estadios = Estadio::all();
        $ciudades = Ciudad::all();
        $partidos = Partido::all();
        $jugadores = Jugador::orderBy('posicionJugador')->get();
        $allclubs = Club::all();
       
        $partidos_historial = array(array('local','visita','goles_local','goles_visita'));
        /*$contador = 0;
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
        */
        //dd($jugadores);

        return view('club.show',['clubes' => $clubes, 'allclubs' => $allclubs, 'partidos' => $partidos, 'partidos_historial' => $partidos_historial, 'torneos' => $torneos, 'id' => $id, 'estadios' => $estadios, 'ciudades' => $ciudades, 'paises' => $paises,  'jugadores'=>$jugadores]);
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
        $clubes = Club::findOrFail($id);
        $asociaciones=Asociacion::all();
        $directorestecnicos=DirectorTecnico::all();
        $ciudades=Ciudad::all();
        $estadios=Estadio::all();
        $paises=Pais::all();
        $torneos=Torneo::all();

        
        return view('club.edit', ['clubes' => $clubes, 'asociaciones' => $asociaciones, 'ciudades' => $ciudades, 'directorestecnicos' => $directorestecnicos, 'estadios' => $estadios, 'paises' => $paises, 'torneos' => $torneos]);
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
        $club = Club::findOrFail($id);
       
        $club->nombreClub = $request->input('nombreClub');
        if(Input::hasfile('imagenClub')){
            $file=Input::file('imagenClub');
            $file->move(public_path().'/images/club/',$file->getClientOriginalName());
            $club->imagenClub=$file->getClientOriginalName();
        }
        $club->fundacionClub = $request->input('fundacionClub');
        $club->sedeClub = $request->input('sedeClub');
        $club->idCiudad = $request->input('idCiudad');
        $club->idPais = $request->input('idPais');        
        $club->correoClub = $request->input('correoClub');
        $club->telefonoClub = $request->input('telefonoClub');
        $club->idAsociacion = $request->input('idAsociacion');
        $club->idDirectorTecnico = $request->input('idDirectorTecnico');
        $club->idEstadio = $request->input('idEstadio');
  
        $club->update();

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
        $clubes = Club::find($id);
        $clubes->delete();

        return Redirect::to('admin');



    }
}
