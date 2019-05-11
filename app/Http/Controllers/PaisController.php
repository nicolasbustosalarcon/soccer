<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Continente;
use App\Pais;



class PaisController extends Controller
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
        $paises = Pais::all();
        $continentes=Continente::all();
        if ($request->user()->authorizeRoles('admin')) {
            # code...
        }
        return view('pais.index', ['paises' => $paises, 'continentes' => $continentes]);

        //return 'Hola desde PaisController';
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
        $continentes=Continente::all();
        

        return view('pais.create', ['continentes' => $continentes->toArray()]);
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
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $pais = new Pais();
        $pais->nombrePais = $request->input('nombrePais');
        $pais->idContinente = $request->input('idContinente');
   
        $pais->save();

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
    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $paises = Pais::findOrFail($id);
        $continentes=Continente::all();
        
        return view('pais.edit', ['paises' => $paises, 'continentes' => $continentes]);
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
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $pais = Pais::findOrFail($id);
        
        $pais->nombrePais = $request->input('nombrePais');
        $pais->idContinente = $request->input('idContinente');
  
        $pais->update();

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
    public function destroy(Request $request, $id)
    {   
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $paises = Pais::find($id);
        $paises->delete();

        return Redirect::to('admin');

    }
}
