<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Federacion extends Model
{
    protected $table = "Federaciones";

    protected $primaryKey='idFederacion';

    protected $fillable = ['idConfederacion', 'nombreFederacion', 'fundacionFederacion', 'sedeFederacion', 'idPais', 'imagenFederacion'];

    public $timestamps = false;

    public function asociaciones()
    {
    	return $this->hasMany('App\Asociacion');
    }

    public function confederaciones()
    {
    	return $this->belongsTo('App\Confederacion', 'idConfederacion');
    }

    public function paises()
    {
        return $this->belongsTo('App\Pais','idPais');
    }
}
