<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Role;
use DB;

class RegistroApiController extends Controller
{
	public function index()
    {
        $usuarios = User::all();
        return response()->json($usuarios,200);

    }
    public function store(Request $request)
    {
    	$pas = 0;
        $roles_user = Role::where('name', 'comentarista')->first();  // LOS USUARIOS QUE SE REGISTREN SERÁN DEL TIPO comentarista
        if ($request['log']=='log') {
        	//$query = mysql_query("SELECT * FROM users WHERE email = '$request[username]' AND password = '$password'");
        	$query = DB::table('users as u')
        	->where('u.email','=',$request['username'])
        	//->where(password_verify($request['password'], 'u.password'))
        	->get();
        	if (empty($query)) {
        		$result = json_encode(array('success' => false, 'msg' => 'Usuario no encontrado'));
        	}else {
        		foreach ($query as $q) {
        			if (password_verify($request['password'], $q->password)) {
        				
        				$datauser = array(
        					'user_id' => $q->id,
        					'username' => $q->email,
        					'name' => $q->name,
        					'password' => $q->password
        				);
        				$result = json_encode(array('success' => true, 'result' => $datauser));
        				$pas = 1;
        			}
        		}
        		if ($pas == 0) {
        			$result = json_encode(array('success' => false, 'msg' => 'Error en la contraseña'));
        		}
        		
        	}
        }else {
        	$user = User::create([
        		'name' => $request['name'],
        		'email' => $request['username'],
        		'password' => Hash::make($request['password']),
                // 'tipo' => $data['tipo'],
        	]);
        	$result = json_encode(array('success' => true));
        	$user->roles()->attach($roles_user);//SE RELACIONAN LOS DOS MODELOS
        }
        echo $result;
    }
}
