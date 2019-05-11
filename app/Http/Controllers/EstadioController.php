<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Pais;
use App\Ciudad;
use App\Estadio;

class EstadioController extends Controller
{
//--------Función que retorna lo que se mostrará en el index--------------------------------------------------------
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadios = Estadio::all();
        $ciudades=Ciudad::all();
        $paises=Pais::all();
        
        return view('estadio.index', ['paises' => $paises, 'estadios' => $estadios, 'ciudades' => $ciudades]);
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
        $ciudades=Ciudad::all();
        $paises=Pais::all();
        //Se carga la tabla necesaria para publicar un anuncio

        return view('estadio.create', ['paises' => $paises->toArray(), 'ciudades' => $ciudades->toArray()]);
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
        $estadio = new Estadio();
        $estadio->nombreEstadio = $request->input('nombreEstadio');
        $estadio->inauguracionEstadio = $request->input('inauguracionEstadio');
        $estadio->idPais = $request->input('idPais');   
        $estadio->idCiudad = $request->input('idCiudad');     
        $estadio->capacidadEstadio = $request->input('capacidadEstadio');
        
        $estadio->save();

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
        $estadios = Estadio::findOrFail($id);
        $ciudades = Ciudad::all();
        $paises   = Pais::all();
       //dd($clubes);
        

        return view('estadio.show',['estadios' => $estadios, 'ciudades' => $ciudades, 'paises' => $paises]);
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
        $estadios = Estadio::findOrFail($id);
        $ciudades=Ciudad::all();
        $paises=Pais::all();
        
        return view('estadio.edit', ['paises' => $paises, 'estadios' => $estadios, 'ciudades' => $ciudades]);
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
        $estadio = Estadio::findOrFail($id);
        
         $estadio->nombreEstadio = $request->input('nombreEstadio');
        $estadio->inauguracionEstadio = $request->input('inauguracionEstadio');
        $estadio->idPais = $request->input('idPais');   
        $estadio->idCiudad = $request->input('idCiudad');     
        $estadio->capacidadEstadio = $request->input('capacidadEstadio');       
  
        $estadio->update();

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
        $estadios = Estadio::find($id);
        $estadios->delete();

        return Redirect::to('admin');
    }
}
