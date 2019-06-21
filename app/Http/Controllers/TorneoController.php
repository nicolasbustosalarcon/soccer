<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

use App\Club;
use App\Asociacion;
use App\Torneo;
use App\Confederacion;

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
       //dd($clubes);
        

        return view('torneo.show',['torneos' => $torneos, 'clubes' => $clubes]);
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
