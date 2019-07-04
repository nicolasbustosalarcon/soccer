<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $table = "usuarioClub";

    protected $primaryKey='idusuarioClub';


    protected $fillable = ['idusuario', 'idClub'];

    public $timestamps = false;

}