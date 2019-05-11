<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Confederacion;
use App\Pais;
use App\Continente;


class ConfederacionController extends Controller
{

//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confederaciones = Confederacion::all();
        $continentes=Continente::all();
        $paises=Pais::all();
        
        return view('confederacion.index', ['paises' => $paises, 'continentes' => $continentes, 'confederaciones' => $confederaciones]);
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
        $continentes=Continente::all();
        $paises=Pais::all();

        return view('confederacion.create', ['paises' => $paises->toArray(), 'continentes' => $continentes->toArray()]);
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
        $confederacion = new Confederacion();
        $confederacion->idContinente = $request->input('idContinente');
        $confederacion->nombreConfederacion = $request->input('nombreConfederacion');
        $confederacion->fundacionConfederacion = $request->input('fundacionConfederacion');
        $confederacion->sedeConfederacion = $request->input('sedeConfederacion');
        $confederacion->idPais = $request->input('idPais');        
        $confederacion->imagenConfederacion = $request->input('imagenConfederacion');
        
        $confederacion->save();

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
        $confederaciones = Confederacion::findOrFail($id);
        $continentes=Continente::all();
        $paises=Pais::all();
        
        return view('confederacion.edit', ['paises' => $paises, 'continentes' => $continentes, 'confederaciones' => $confederaciones]);
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
        $confederacion = Confederacion::findOrFail($id);
        
        $confederacion->idContinente = $request->input('idContinente');
        $confederacion->nombreConfederacion = $request->input('nombreConfederacion');
        $confederacion->fundacionConfederacion = $request->input('fundacionConfederacion');
        $confederacion->sedeConfederacion = $request->input('sedeConfederacion');
        $confederacion->idPais = $request->input('idPais');        
        $confederacion->imagenConfederacion = $request->input('imagenConfederacion');
        
  
        $confederacion->update();

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
        $confederaciones = Confederacion::find($id);
        $confederaciones->delete();

        return Redirect::to('admin');
    }
}
