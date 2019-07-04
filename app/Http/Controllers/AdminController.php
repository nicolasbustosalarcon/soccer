<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Asociacion;
use App\Pais;
use App\Arbitro;
use App\Federacion;
use App\Ciudad;
use App\Club;
use App\Estadio;
use App\DirectorTecnico;
use App\Torneo;
use App\Confederacion;
use App\Continente;
use App\Jugador;
use App\User;
use App\Partido;






class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $request->user()->authorizeRoles('admin'); //Se valida que el usuario que verá estos datos sea de tipo administrador

        $arbitros = Arbitro::all();
        $asociaciones=Asociacion::all();
        $paises=Pais::all();
        $federaciones=Federacion::all();
        $ciudades = Ciudad::select()->paginate(10);
        $clubes = Club::select()->paginate(10);
        $torneos = Torneo::all();
        $confederaciones = Confederacion::all();
        $continentes=Continente::all();
        $directorestecnicos = DirectorTecnico::all();
        $estadios = Estadio::all();
        $jugadores = Jugador::select()->paginate(5);
        $users = User::all();
        $partido = Partido::select()->paginate(5);
        /*if ($request)
        {
            $query=trim($request->get('searchText'));//Se obtiene la busqueda por parte del usuario
            foreach($all as $a){
                if ($a->rut == $query) {
                    $rut = $query;  
                    return view('desafio.busqueda',['rut'=>$rut], compact('all'));
                }
            }
        }*/



        return view('admin.index', ['paises' => $paises, 'asociaciones' => $asociaciones, 'arbitros' => $arbitros, 'federaciones' => $federaciones, 'ciudades' => $ciudades, 'clubes'=> $clubes, 'torneos' => $torneos, 'continentes' => $continentes, 'confederaciones' => $confederaciones, 'directorestecnicos' => $directorestecnicos, 'estadios' => $estadios, 'jugadores' => $jugadores, 'users'=> $users,'partido'=>$partido]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
