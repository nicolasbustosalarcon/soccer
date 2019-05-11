<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


use App\Confederacion;
use App\Pais;
use App\Federacion;

class FederacionController extends Controller
{
//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $federaciones = Federacion::all();
        $confederaciones=Confederacion::all();
        $paises=Pais::all();
        
        return view('federacion.index', ['paises' => $paises, 'federaciones' => $federaciones, 'confederaciones' => $confederaciones]);
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
        $confederaciones=Confederacion::all();
        $paises=Pais::all();

        return view('federacion.create', ['paises' => $paises->toArray(), 'confederaciones' => $confederaciones->toArray()]);
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
        $federacion = new Federacion();
        $federacion->nombreFederacion = $request->input('nombreFederacion');
        $federacion->idConfederacion = $request->input('idConfederacion');
        $federacion->fundacionFederacion = $request->input('fundacionFederacion');
        $federacion->sedeFederacion = $request->input('sedeFederacion');
        $federacion->idPais = $request->input('idPais');        
        $federacion->imagenFederacion = $request->input('imagenFederacion');
        
        $federacion->save();

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
        //
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
        $federaciones = Federacion::findOrFail($id);
        $confederaciones=Confederacion::all();
        $paises=Pais::all();
        
        return view('federacion.edit', ['paises' => $paises, 'federaciones' => $federaciones, 'confederaciones' => $confederaciones]);
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
        $federacion = Federacion::findOrFail($id);
        
        $federacion->nombreFederacion = $request->input('nombreFederacion');
        $federacion->idConfederacion = $request->input('idConfederacion');
        $federacion->fundacionFederacion = $request->input('fundacionFederacion');
        $federacion->sedeFederacion = $request->input('sedeFederacion');
        $federacion->idPais = $request->input('idPais');        
        $federacion->imagenFederacion = $request->input('imagenFederacion');      
  
        $federacion->update();

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
        $federaciones = Federacion::find($id);
        $federaciones->delete();

        return Redirect::to('admin');
    }
}
