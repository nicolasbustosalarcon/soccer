<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Role;
use App\User;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $roles_user = Role::where('name', 'comentarista')->first();  // Trae la informacion del usuario y el administrador

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        //$user->tipoUsuario = $request->input('tipoUsuario');
        $user->remember_token = $request->input('remembertoken');
        //$user->created_at = $request->input('created_at');
       // $user->update_at = $request->input('update_at');

        //pass juanaravena = query1
        //$ php artisan migrate:refresh --seed

        $user->save();

        $user->roles()->attach($roles_user);//SE RELACIONAN LOS DOS MODELOS


        return Redirect::to('user');
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
        $users = User::findOrFail($id);
        
        
        return view('user.edit', ['users' => $users]);
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
        $user = User::findOrFail($id);
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->tipo = $request->input('tipo');
        $user->remember_token = $request->input('remembertoken');
        // $user->created_at = $request->input('created_at');
        // $user->update_at = $request->input('update_at');

        $user->update();

        return Redirect::to('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();

        return Redirect::to('user');
    }
}
