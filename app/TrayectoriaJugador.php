<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrayectoriaJugador extends Model
{
    protected $table = "TrayectoriasJugadores";

    protected $primaryKey='idTrayectoriaJugador';

    protected $fillable = ['idJugador', 'idClub', 'idTorneo','camisetaJugador'];

    public $timestamps = false;

    public function jugadores()
    {
    	return $this->belongsTo('App\Jugador', 'idJugador');
    }

    public function clubes()
    {
    	return $this->belongsTo('App\Club', 'idClub');
    }

    public function torneos()
    {
    	return $this->belongsTo('App\Torneo', 'idTorneo');
    }
}
