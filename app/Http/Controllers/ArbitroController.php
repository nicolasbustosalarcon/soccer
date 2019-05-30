<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;


use App\Asociacion;
use App\Pais;
use App\Arbitro;

use DateTime;
use Carbon\Carbon;
class ArbitroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $arbitros = Arbitro::all();
        $asociaciones=Asociacion::all();
        $paises=Pais::all();
        
        return view('arbitro.index', ['paises' => $paises, 'asociaciones' => $asociaciones, 'arbitros' => $arbitros]);
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
        $paises=Pais::all();

        return view('arbitro.create', ['paises' => $paises->toArray(), 'asociaciones' => $asociaciones->toArray()]);
    }
//-------------------------------------------------------------------------------------------------------------------


//----------------Función para guardar un nuevo dato-----------------------------------------------------------------
	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arbitro = new Arbitro();
        $arbitro->idAsociacion = $request->input('idAsociacion');
        $arbitro->nombreArbitro = $request->input('nombreArbitro');
        $arbitro->apellidosArbitro = $request->input('apellidosArbitro');
        $arbitro->tipoArbitro = $request->input('tipoArbitro');
        $anho = $request->input('anho');
        $mes = $request->input('mes');
        $dia = $request->input('dia');
        $arbitro->nacimientoArbitro = $anho.'-'.$mes.'-'.$dia;
        $arbitro->idPais = $request->input('idPais');        
        if(Input::hasfile('imagenArbitro')){
            $file=Input::file('imagenArbitro');
            $file->move(public_path().'/images/arbitro/',$file->getClientOriginalName());
            $arbitro->imagenArbitro=$file->getClientOriginalName();
        }
        $arbitro->edadArbitro= Carbon::createFromDate($anho,$mes,$dia)->age;
        $arbitro->gradoArbitro = $request->input('gradoArbitro');
        
        $arbitro->save();

        return Redirect::to('arbitro');
    }
//-------------------------------------------------------------------------------------------------------------------


//-----------------------
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


//---------------------------------Funcion que retorna las variables para el edit--------------------------------    
    public function edit($id, Request $request)
    {
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $arbitros = Arbitro::findOrFail($id);
        $asociaciones=Asociacion::all();
        $paises=Pais::all();
        
        return view('arbitro.edit', ['paises' => $paises, 'asociaciones' => $asociaciones, 'arbitros' => $arbitros]);
     
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

        /*if(Input::hasFile('imagenArbitro')){
            $file = Input::file('imagenArbitro');
            $file->move(public_path().'/images/arbitro/',$file->getClientOriginalName());
            $arbitro->imagenArbitro  = $file->getClientOriginalName();
                        
            
        }*/
      
        
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $arbitro = Arbitro::findOrFail($id);
        
        $arbitro->idAsociacion = $request->input('idAsociacion');
        $arbitro->nombreArbitro = $request->input('nombreArbitro');
        $arbitro->apellidosArbitro = $request->input('apellidosArbitro');
        $arbitro->tipoArbitro = $request->input('tipoArbitro');
        $arbitro->nacimientoArbitro = $request->input('nacimientoArbitro');
        $arbitro->idPais = $request->input('idPais');        
        
        $arbitro->edadArbitro = $request->input('edadArbitro');
        $arbitro->gradoArbitro = $request->input('gradoArbitro');
        $arbitro->update();

        return Redirect::to('admin');

       
       // dd($arbitros);
    }
//-------------------------------------------------------------------------------------------------------------------


//-------------------Funcion para eliminar (borrado fisico)-------------------------------------------------------   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $arbitros = Arbitro::find($id);
        $arbitros->delete();

        return Redirect::to('admin');
    }
}
