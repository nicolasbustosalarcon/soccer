<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = "Clubes";

    protected $primaryKey='idClub';

    protected $fillable = ['nombreClub', 'imagenClub', 'fundacionClub', 'sedeClub', 'idCiudad', 'idPais', 'correoClub', 'telefonoClub', 'idAsociacion', 'idDirectorTecnico', 'idEstadio', 'idTorneo'];

    public $timestamps = false;

    public function jugadores()
    {
    	return $this->hasMany('App\Jugador');
    }

    public function estadios()
    {
    	return $this->belongsTo('App\Estadio','idEstadio');
    }

    public function asociaciones()
    {
    	return $this->belongsTo('App\Asociacion', 'idAsociacion');
    }

    public function torneocampeon()
    {
    	return $this->hasMany('App\Torneo');
    }

    public function trayectoriasjugadores()
    {
    	return $this->hasMany('App\TrayectoriaJugador');
    }

    public function trayectoriasdirectorestecnico()
    {
    	return $this->hasMany('App\TrayectoriaDirectorTecnico');
    }

    public function directorestecnicos()
    {
    	return $this->belongsTo('App\DirectorTecnico', 'idDirectorTecnico');
    }

    public function paises()
    {
        return $this->belongsTo('App\Pais','idPais');
    }

    public function torneos()
    {
        return $this->belongsTo('App\Torneo','idTorneo');
    }
}
