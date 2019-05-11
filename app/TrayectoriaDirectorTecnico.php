<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrayectoriaDirectorTecnico extends Model
{
    protected $table = "TrayectoriasDirectoresTecnicos";

    protected $primaryKey=['idDirectorTecnico', 'idClub'];

    public $timestamps = false;

    public function directorestecnicos()
    {
    	return $this->belongsTo('App\DirectorTecnico', 'idDirectorTecnico');
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
