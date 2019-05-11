<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asociacion extends Model
{
    protected $table = "Asociaciones";

    protected $primaryKey='idAsociacion';

    protected $fillable = ['idFederacion', 'nombreAsociacion', 'fundacionAsociacion', 'sedeAsociacion', 'idPais', 'imagenAsociacion'];

    public $timestamps = false;

    /*public function arbitros()
    {
    	return $this->hasMany('App\Arbitro');
    }

    public function torneos()
    {
    	return $this->hasMany('App\Torneo');
    }

    public function clubes()
    {
    	return $this->hasMany('App\Club');
    }*/

    public function federaciones()
    {
    	return $this->belongsTo('App\Federacion','idFederacion');
    }

    public function paises()
    {
    	return $this->belongsTo('App\Pais','idPais');
    }

}
