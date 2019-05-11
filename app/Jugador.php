<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = "Jugadores";

    protected $primaryKey='idJugador';

    protected $fillable = ['nombreJugador', 'apellidosJugador', 'nacimientoJugador', 'edadJugador', 'posicionJugador', 'alturaJugador', 'pesoJugador', 'pieJugador', 'idCLub', 'golesJugador', 'amarillasJugador', 'rojasJugador', 'minutostotalesJugador', 'imagenJugador', 'idPais'];

    public $timestamps = false;

    public function clubes()
    {
    	return $this->belongsTo('App\Club', 'idCLub');
    }

    public function paises()
    {
        return $this->belongsTo('App\Pais','idPais');
    }

    public function trayectoriasjugadores()
    {
    	return $this->hasMany('App\TrayectoriaJugador');
    }

    public function historiales()
    {
        return $this->hasMany('App\Historial');
    }
}
