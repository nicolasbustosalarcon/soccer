<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table = "Partidos";

    protected $primaryKey='idPartido';

    protected $fillable = ['clubLocalPartido','clubVisitaPartido', 'fechaPartido', 'jornadaPartido', 'idEstadio', 'idArbitroCentral', 'idTorneo', 'TipoPartido', 'golesVisitaPartido', 'golesLocalPartido', 'estadoPartido', 'idArbitroAsistente1', 'idArbitroAsistente2','idCuartoArbitro'];

    public $timestamps = false;

    public function clubeslocales()
    {
    	return $this->belongsTo('App\Club', 'idClub');
    }

    public function clubesvisitas()
    {
    	return $this->belongsTo('App\Club', 'idClub');
    }

    public function estadios()
    {
    	return $this->belongsTo('App\Estadio', 'idEstadio');
    }

    public function torneos()
    {
    	return $this->belongsTo('App\Torneo', 'idTorneo');
    }

    public function arbitros()
    {
    	return $this->belongsTo('App\Arbitro', 'idArbitro');
    }

    public function historiales()
    {
        return $this->hasMany('App\Historial');
    }

}
