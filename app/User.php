<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Schema;

class User extends Authenticatable
{
    use Notifiable;

    //*****Funcion para relacionar con los roles*****
    public function roles(){
        return $this->belongsToMany('App\Role');
    }
    //**********************************************

    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
                return true;
            }

        abort(401, 'Esta acción no está autorizada.');
    }
//---------FUNCION SOLO PARA VALIDAR LA REDIRECCION POR ROLES EN EL LOGIN----------
    public function authorizeRolesLogin($roles){
        if($this->hasAnyRole($roles)){
                return true;
            }
            else{
                return null;
            }

        ;
    }
//-------------------------------------------------------------------------------


    //*******Validación de cuantos roles son***********
    public function hasAnyRole($roles){
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if($this->hasRole($role)){
                    return true;
                }
            }
        }
        else{
            if($this->hasRole($roles)){
                return true;
            }
        }

        return false;
    }
    //****LOGICA DE VALIDACION*******
    public function hasRole($role){
        if ($this->roles()->where('name',$role)->first()) { //Se valida que el usuario tenga este rol
            return true;
            }
            return false;
    }
    //**************************

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $primaryKey='id';

    protected $fillable = [
        'name', 'email', 'password'//, 'tipo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;

    
}
