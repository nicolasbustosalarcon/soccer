<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";

    protected $primaryKey='id';

    protected $fillable = ['name', 'descrption'];

    //*****Funcion para relacionar con los usuarios*****
    public function users(){
        return $this->belongsToMany('App\User');
    }
    //**********************************************
}

