<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Partido;

use App\Club;
use App\Asociacion;
use App\Torneo;
use App\Confederacion;
use App\Posicion;
use DB;

class TorneoController extends Controller
{
//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $torneos = Torneo::all();
        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $confederaciones=Confederacion::all();
        
        return view('torneo.index', ['torneos' => $torneos,'asociaciones' => $asociaciones, 'clubes' => $clubes, 'confederaciones' => $confederaciones]);

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
        $clubes=Club::all();
        $confederaciones=Confederacion::all();
        

        return view('torneo.create', ['asociaciones' => $asociaciones->toArray(), 'confederaciones' => $confederaciones->toArray(), 'clubes' => $clubes->toArray()]);
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
        $torneo = new Torneo();
        $torneo->nombreTorneo = $request->input('nombreTorneo');
        $torneo->idClubCampeon = $request->input('idClubCampeon');
        if(Input::hasfile('imagenTorneo')){
            $file=Input::file('imagenTorneo');
            $file->move(public_path().'/images/torneos/',$file->getClientOriginalName());
            $torneo->imagenTorneo=$file->getClientOriginalName();
        }
        $torneo->edicion = $request->input('edicion');
        $torneo->idConfederacion = $request->input('idConfederacion');
        $torneo->idAsociacion = $request->input('idAsociacion');
        

        $torneo->save();

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
        $torneos = Torneo::findOrFail($id);
        $clubes = Club::all();
        $partidos = Partido::all();

        $numclubs = Club::select()
                ->where('idTorneo', '=', $id)
                ->get();
        $cant_club = count($numclubs);


        $posiciones = Posicion::select()
                ->where('idTorneo', '=', $id)
                ->orderBy('Puntos', 'desc')
                ->get();
        $varnum = count($posiciones);

       //dd($posiciones);
        return view('torneo.show',['torneos' => $torneos, 'clubes' => $clubes, 'posiciones' => $posiciones, 'varnum' => $varnum]);
    }
 
    public function posiciones($id)
    {
        $torneos = Torneo::findOrFail($id);
        $clubes = Club::all();
        $partidos = Partido::all();

        $numclubs = Club::select()
                ->where('idTorneo', '=', $id)
                ->get();
        $cant_club = count($numclubs);
        $posiciones = Posicion::select()
                        ->where('idTorneo', '=', $id)
                        ->orderBy('Puntos', 'desc')
                        ->get();
        $varnum = count($posiciones);

        $agregar_equipo = Posicion::all();


        $ciclo = '1';
        

        $nuevoequipo=new Posicion;
        foreach ($partidos as $p) {
            if ($p->idTorneo == $id) {
                foreach ($agregar_equipo as $ag) {
                    if($p->leido == '3'){
                        if ($ag->idClub == $p->clubLocalPartido) {
                            if ($p->golesLocalPartido > $p->golesVisitaPartido) {
                                $equipo_actualizar=Posicion::findOrFail($ag->idPosicion);
                                $equipo_actualizar->PG = $equipo_actualizar->PG + 1;
                                $equipo_actualizar->update();

                            }
                            if ($p->golesLocalPartido == $p->golesVisitaPartido) {
                                $equipo_actualizar=Posicion::findOrFail($ag->idPosicion);
                                $equipo_actualizar->PE = $equipo_actualizar->PE + 1;
                                $equipo_actualizar->update();
                            }
                            if ($p->golesLocalPartido < $p->golesVisitaPartido) {
                                $equipo_actualizar=Posicion::findOrFail($ag->idPosicion);
                                $equipo_actualizar->PP = $equipo_actualizar->PP + 1;                                
                                $equipo_actualizar->update();
                            }
                            $partido_actualizar = Partido::findOrFail($p->idPartido);
                            $partido_actualizar->leido = '4';
                            $partido_actualizar->update();
                        }
                    }
                    else{
                        if($p->leido == '4'){
                            if ($ag->idClub == $p->clubVisitaPartido) {
                                if ($p->golesLocalPartido > $p->golesVisitaPartido) {
                                    $equipo_actualizar=Posicion::findOrFail($ag->idPosicion);
                                    $equipo_actualizar->PP = $equipo_actualizar->PP + 1;
                                    $equipo_actualizar->update();
                                }
                                if ($p->golesLocalPartido == $p->golesVisitaPartido) {
                                    $equipo_actualizar=Posicion::findOrFail($ag->idPosicion);
                                    $equipo_actualizar->PE = $equipo_actualizar->PE + 1;
                                    $equipo_actualizar->update();
                                }
                                if ($p->golesLocalPartido < $p->golesVisitaPartido) {
                                    $equipo_actualizar=Posicion::findOrFail($ag->idPosicion);
                                    $equipo_actualizar->PG = $equipo_actualizar->PG + 1;
                                    $equipo_actualizar->update();
                                }
                            }
                        }
                        $partido_actualizar = Partido::findOrFail($p->idPartido);
                        $partido_actualizar->leido = '5';
                        $partido_actualizar->update();
                    }
                }
            }
        }
        if($ciclo == '1'){//Si el ciclo no se cerró, no se encontro coincidencia por lo que se agrega a la BD
            foreach($partidos as $part){
                if($part->idTorneo == $id){
                    if($part->leido == '0'){
                        $partido_actualizar = Partido::findOrFail($part->idPartido);
                        $partido_actualizar->leido = '1';
                        $partido_actualizar->update();
                        $nuevoequipo->idTorneo = $id;
                        $nuevoequipo->idClub = $part->clubLocalPartido ;
                        $nuevoequipo->save();
                    }
                    if($part->leido == '1'){
                        $partido_actualizar = Partido::findOrFail($part->idPartido);
                        $partido_actualizar->leido = '3';
                        $partido_actualizar->update();
                        $nuevoequipo->idTorneo = $id;
                        $nuevoequipo->idClub = $part->clubVisitaPartido ;
                        $nuevoequipo->save();
                        
                    }
                }                    
            }
        }
        return view('torneo.posiciones',['torneos' => $torneos, 'clubes' => $clubes, 'posiciones' => $posiciones, 'varnum' => $varnum]);
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
        $torneos = Torneo::findOrFail($id);
        $asociaciones=Asociacion::all();
        $clubes=Club::all();
        $confederaciones=Confederacion::all();

        
        return view('torneo.edit', ['torneos' => $torneos,'asociaciones' => $asociaciones, 'clubes' => $clubes, 'confederaciones' => $confederaciones]);
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
        $torneo = Torneo::findOrFail($id);
        
        $torneo->nombreTorneo = $request->input('nombreTorneo');
        $torneo->idClubCampeon = $request->input('idClubCampeon');
        $torneo->edicion = $request->input('edicion');
        $torneo->idConfederacion = $request->input('idConfederacion');
        $torneo->idAsociacion = $request->input('idAsociacion');
        if(Input::hasfile('imagenTorneo')){
                    $file=Input::file('imagenTorneo');
                    $file->move(public_path().'/images/torneos/',$file->getClientOriginalName());
                    $torneo->imagenTorneo=$file->getClientOriginalName();
        }
        $torneo->update();

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
        $torneos = Torneo::find($id);
        $torneos->delete();

        return Redirect::to('admin');
    }
}
