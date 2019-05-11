<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Club;
use App\DirectorTecnico;
use App\Pais;

class DirectorTecnicoController extends Controller
{
//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directorestecnicos = DirectorTecnico::all();
        $paises=Pais::all();
        
        return view('directortecnico.index', ['paises' => $paises, 'directorestecnicos' => $directorestecnicos]);

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
        
        $paises=Pais::all();

        return view('directortecnico.create', ['paises' => $paises->toArray()]);
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
        $directortecnico = new DirectorTecnico();
        $directortecnico->nombreDirectorTecnico = $request->input('nombreDirectorTecnico');
        $directortecnico->apellidosDirectorTecnico = $request->input('apellidosDirectorTecnico');
        $directortecnico->nacimientoDirectorTecnico = $request->input('nacimientoDirectorTecnico');
        $directortecnico->edadDirectorTecnico = $request->input('edadDirectorTecnico');
        $directortecnico->imagenDirectorTecnico = $request->input('imagenDirectorTecnico');
        $directortecnico->idPais = $request->input('idPais');        
        
        $directortecnico->save();

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
        $directorestecnicos = DirectorTecnico::findOrFail($id);
        $paises=Pais::all();
        
        return view('directortecnico.edit', ['paises' => $paises, 'directorestecnicos' => $directorestecnicos]);
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
        $directortecnico = DirectorTecnico::findOrFail($id);
        
        $directortecnico->nombreDirectorTecnico = $request->input('nombreDirectorTecnico');
        $directortecnico->apellidosDirectorTecnico = $request->input('apellidosDirectorTecnico');
        $directortecnico->nacimientoDirectorTecnico = $request->input('nacimientoDirectorTecnico');
        $directortecnico->edadDirectorTecnico = $request->input('edadDirectorTecnico');
        $directortecnico->imagenDirectorTecnico = $request->input('imagenDirectorTecnico');
        $directortecnico->idPais = $request->input('idPais');        
  
        $directortecnico->update();

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
        $directorestecnicos = DirectorTecnico::find($id);
        $directorestecnicos->delete();

        return Redirect::to('admin');
    }
}
