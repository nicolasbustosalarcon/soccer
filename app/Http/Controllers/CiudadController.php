<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Ciudad;
use App\Pais;


class CiudadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------

    public function index()
    {
        $ciudades = Ciudad::all();
        $paises=Pais::all();
        
        return view('ciudad.index', ['paises' => $paises, 'ciudades' => $ciudades]);

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

        return view('ciudad.create', ['paises' => $paises->toArray()]);
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
        $ciudad = new Ciudad();
        $ciudad->nombreCiudad = $request->input('nombreCiudad');
        $ciudad->idPais = $request->input('idPais');        
        
        $ciudad->save();

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



//---------------------------------Funcion que retorna las variables para el edit--------------------------------    
    public function edit($id)
    {
        $ciudades = Ciudad::findOrFail($id);
        $paises=Pais::all();
        
        return view('ciudad.edit', ['paises' => $paises, 'ciudades' => $ciudades]);
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
        $ciudad = Ciudad::findOrFail($id);
        
       
        $ciudad->nombreCiudad = $request->input('nombreCiudad');
       
        $ciudad->idPais = $request->input('idPais');        
      
  
        $ciudad->update();

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
        $ciudades = Ciudad::find($id);
        $ciudades->delete();

        return Redirect::to('admin');
    }
}
