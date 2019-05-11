<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Asociacion;
use App\Federacion;
use App\Pais;


class AsociacionController extends Controller
{

//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $asociaciones = Asociacion::all();
        $federaciones=Federacion::all();
        $paises=Pais::all();
        
        return view('asociacion.index', ['paises' => $paises, 'federaciones' => $federaciones, 'asociaciones' => $asociaciones]);

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
        $federaciones=Federacion::all();
        $paises=Pais::all();

        return view('asociacion.create', ['paises' => $paises->toArray(), 'federaciones' => $federaciones->toArray()]);
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
        if($request->hasFile('imagenAsociacion')){
            $file = $request->file('imagenAsociacion');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/asociacion/',$name);
            
            
        }
        $asociacion = new Asociacion();
        $asociacion->idFederacion = $request->input('idFederacion');
        $asociacion->nombreAsociacion = $request->input('nombreAsociacion');
        $asociacion->fundacionAsociacion = $request->input('fundacionAsociacion');
        $asociacion->sedeAsociacion = $request->input('sedeAsociacion');
        $asociacion->idPais = $request->input('idPais');        
        $asociacion->imagenAsociacion =$name;
        
        $asociacion->save();

        return Redirect::to('asociacion');
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

//---------------------------------Funcion que retorna las variables para el edit--------------------------------    
 
    public function edit($id, Request $request)
    {
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $asociaciones = Asociacion::findOrFail($id);
        $federaciones=Federacion::all();
        $paises=Pais::all();
        
        return view('asociacion.edit', ['paises' => $paises, 'federaciones' => $federaciones, 'asociaciones' => $asociaciones]);

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
        $asociacion = Asociacion::findOrFail($id);
        
        $asociacion->idFederacion = $request->input('idFederacion');
        $asociacion->nombreAsociacion = $request->input('nombreAsociacion');
        $asociacion->fundacionAsociacion = $request->input('fundacionAsociacion');
        $asociacion->sedeAsociacion = $request->input('sedeAsociacion');
        $asociacion->idPais = $request->input('idPais');        
        $asociacion->imagenAsociacion = $request->input('imagenAsociacion');
  
        $asociacion->update();

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
    public function destroy($id,Request $request)
    {
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $asociaciones = Asociacion::find($id);
        $asociaciones->delete();

        return Redirect::to('admin');
    }
}
