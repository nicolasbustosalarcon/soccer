<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continente extends Model
{
    protected $table = "Continentes";

    protected $primaryKey= 'idContinente';

    protected $fillable = ['nombreContinente'];

    public $timestamps = false;


	public function confederaciones()
	{
		return $this->hasOne('App\Confederacion');
	}

	public function paises()
    {
    	return $this->hasMany('App\Pais');
    }

}