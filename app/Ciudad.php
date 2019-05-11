<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = "Ciudades";

    protected $primaryKey='idCiudad';

    protected $fillable = ['nombreCiudad', 'idPais'];

    public $timestamps = false;

    public function paises()
    {
    	return $this->belongsTo('App\Pais','idPais');
    }
}
