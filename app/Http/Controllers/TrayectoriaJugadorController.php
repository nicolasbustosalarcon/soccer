<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


use App\Pais;
use App\Club;
use App\Jugador;
use App\TrayectoriaJugador;
use App\Torneo;
use DB;


class TrayectoriaJugadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $jugadores = Jugador::findOrFail($id);
       
        $paises         = Pais::all();
        $clubes         = Club::all();
       $trayectorias = DB::table('TrayectoriasJugadores as tj')
        ->join('clubes as c','tj.idClub','=','c.idClub')
        //->select('tj.camisetaJugador','c.nombreClub as nombreClub','c.imagenClub as imagen','tj.idClub', 'tj.idTorneo')
        ->where('tj.idJugador','=',$id)
        ->get();
       $torneos         = Torneo::all();
        
        //dd($trayectorias);

        return view('trayectoriajugador.create',['clubes' => $clubes, 'paises' => $paises,  'jugadores' => $jugadores, 'trayectorias' => $trayectorias, 'torneos' => $torneos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trayectoriajugador = new TrayectoriaJugador();
        $trayectoriajugador->idClub = $request->input('idClub');
        $trayectoriajugador->idJugador = $request->input('idJugador');
        $trayectoriajugador->idTorneo = $request->input('idTorneo');   
        $trayectoriajugador->camisetaJugador = $request->input('camisetaJugador');     
        

        
        $trayectoriajugador->save();

        return Redirect::to('partido');
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
       $trayectorias    = TrayectoriaJugador::findOrFail($id); 
       
        $paises         = Pais::all();
        $clubes         = Club::all();
        
        $jugadores = Jugador::all();
        $torneos         = Torneo::all();

        return view('trayectoriajugador.edit',['clubes' => $clubes, 'paises' => $paises,  'jugadores' => $jugadores, 'trayectorias' => $trayectorias, 'torneos' => $torneos]);
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
        $request->user()->authorizeRoles('user'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $trayectoriajugador = TrayectoriaJugador::findOrFail($id);
        
        $trayectoriajugador->camisetaJugador = $request->input('camisetaJugador');
        $trayectoriajugador->idClub = $request->input('idClub');
        $trayectoriajugador->idTorneo = $request->input('idTorneo');
  
        $trayectoriajugador->update();

        return Redirect::to('partido');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $request->user()->authorizeRoles('user'); //Se valida que el usuario que verá estos datos sea de tipo administrador
        $trayectoriajugador = TrayectoriaJugador::find($id);
        $trayectoriajugador->delete();

        return Redirect::to('partido');
    }
}
