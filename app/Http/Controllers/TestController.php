<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asociacion;

class TestController extends Controller
{
    public function view($idAsociacion)
    {
    		$asociaciones = Asociacion::find($idAsociacion);
    		$asociaciones->federaciones;
    		$asociaciones->paises;
    	
    		
    		return view('test.index',['asociaciones'=> $asociaciones]); 
    }

    public function prueba()
    {
    	return 'estoy dentro de testcontroller';
    }
}