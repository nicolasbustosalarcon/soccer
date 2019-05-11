<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table = "Paises";

    protected $primaryKey='idPais';

    protected $fillable = ['nombrePais', 'idContinente'];

    public $timestamps = false;

    public function ciudades()
    {
    	return $this->hasMany('App\Ciudad');
    }

    public function directorestecnicos()
    {
    	return $this->hasMany('App\DirectorTecnico');
    }

    public function jugadores()
    {
    	return $this->hasMany('App\Jugador');
    }
    //------------_RECIBE EL ID DEL CONTINENTE-------------------
     public function continentes()
    {
        return $this->belongsTo('App\Continente','idContinente');
    }

}