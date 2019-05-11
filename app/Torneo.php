<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    protected $table = "Torneos";

    protected $primaryKey='idTorneo';

    protected $fillable = ['nombreTorneo', 'edicion', 'idConfederacion', 'idAsociacion', 'idClubCampeon'];

    public $timestamps = false;

    public function asociaciones()
    {
    	return $this->belongsTo('App\Asociacion', 'idAsociacion');
    }
    public function confederaciones()
    {
    	return $this->belongsTo('App\Confederacion', 'idConfederacion');
    }

    public function clubcampeon()
    {
    	return $this->belongsTo('App\Club','idClub');
    }

    public function trayectoriasjugadores()
    {
    	return $this->hasMany('App\TrayectoriaJugador');
    }

    public function partidos()
    {
    	return $this->hasMany('App\Partido');
    }

    public function trayectoriasdirectorestecnicos()
    {
    	return $this->hasMany('App\TrayectoriaDirectorTecnico');
    }

}
