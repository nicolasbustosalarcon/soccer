<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DirectorTecnico extends Model
{
    protected $table = "DirectoresTecnicos";

    protected $primaryKey='idDirectorTecnico';

    protected $fillable = ['nombreDirectorTecnico', 'apellidoDirectorTecnico', 'nacimientoDirectorTecnico', 'edadDirectorTecnico', 'idPais', 'imagenDirectorTecnico'];

    public $timestamps = false;

    public function paises()
    {
        return $this->belongsTo('App\Pais','idPais');
    }

    public function trayectoriasdirectorestecnicos()
    {
    	return $this->hasMany('App\TrayectoriaDirectorTecnico');
    }

    public function clubes()
    {
    	return $this->hasOne('App\Club', 'idDirectorTecnico');
    }
}
