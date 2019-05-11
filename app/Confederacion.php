<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confederacion extends Model
{
    protected $table = "Confederaciones";

    protected $primaryKey='idConfederacion';

    protected $fillable = ['idContinente', 'nombreConfederacion', 'fundacionConfederacion', 'sedeConfederacion', 'idPais', 'imagenConfederacion'];

    public $timestamps = false;

    public function federaciones()
    {
    	return $this->hasMany('App\Federacion');
    }

    public function torneos()
    {
    	return $this->hasMany('App\Torneo');
    }

    public function continentes()
    {
        return $this->belongTo('App\Continente', 'idContinente');
    }

    public function paises()
    {
        return $this->belongsTo('App\Pais','idPais');
    }
}
