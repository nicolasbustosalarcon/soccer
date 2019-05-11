<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estadio extends Model
{
    protected $table = "Estadios";

    protected $primaryKey='idEstadio';


    protected $fillable = ['nombreEstadio', 'idPais', 'idCiudad', 'inauguracionEstadio', 'capacidadEstadio'];

    public $timestamps = false;

    public function clubes()
    {
    	return $this->hasMany('App\Club');
    }

    public function paises()
    {
    	return $this->belongsTo('App\Pais','idPais');
    }
}
