<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arbitro extends Model
{
    protected $table = "Arbitros";

    protected $primaryKey='idArbitro';

    protected $fillable = ['nombreArbitro', 'apellidosArbitro', 'tipoArbitro', 'nacimientoArbitro', 'idPais', 'edadArbitro', 'idAsociacion', 'gradoArbitro', 'imagenArbitro'];

    public $timestamps = false;

    public function partidos()
    {
    	return $this->hasMany('App\Partido');
    }

    public function asociaciones()
    {
        return $this->belongsTo('App\Asociacion', 'idAsociacion');
    }

    public function paises()
    {
    	return $this->belongsTo('App\Pais', 'idPais');
    }
}
