<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posicion extends Model
{
    protected $table = "posiciones";

    protected $primaryKey='idPosicion';

    protected $fillable = ['idTorneo', 'idClub', 'PG', 'PE', 'PP', 'GF', 'GolesFavor', 'GolesContra', 'Diferencia', 'Puntos'];

    public $timestamps = false;


    public function torneos()
    {
        return $this->belongsTo('App\Torneo','idTorneo');
    }


     public function clubes()
    {
        return $this->belongsTo('App\Club', 'idCLub');
    }

   

}
