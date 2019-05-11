<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "Usuarios";

    protected $primaryKey='idUsuario';

    protected $fillable = ['idUsuario', 'nombreUsuario', 'apellidosUsuario', 'contraseñaUsuario', 'emailUsuario', 'tipoUsuario'];

    public $timestamps = false;

}
