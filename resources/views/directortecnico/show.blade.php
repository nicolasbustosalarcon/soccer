@extends ('layouts.app')

@section ('titulo', 'Jugador' .$directortecnico->idDirectorTecnico)

@section ('content')

<div id="player" class="container">
    <div class="row">
        <div class="player col-sm-9">
            <div class="row">
                <div class="player-image col-sm-5">
                    <img src="{{asset('images/directortecnico/' .$directortecnico->imagenDirectorTecnico)}}" class="border border-warning" height="353x" width="320px">
                    <span class="gradient" ></span>
                </div>
                <div class="col-sm-7 border border-warning">
                    <div class="player-data text-white">
                        <h1>{{$directortecnico->nombreDirectorTecnico}} {{$directortecnico->apellidosDirectorTecnico}}</h1>
                        
                    </div>
                    <div class="row">
                        <ul class="player-list text-white">
                            <li class="b-day">Fecha de Nacimiento: <span>{{$directortecnico->nacimientoDirectorTecnico}}</span><br>
                                
                            </li>
                            <li class="origin">Edad: <span>{{$directortecnico->edadDirectorTecnico}}</span><br>                            
                            </li>
                            @foreach($paises as $pais)
                                @if($directortecnico->idPais === $pais->idPais)
                                <li class="country">Nacionalidad:  <span>{{$pais->nombrePais}}</span><br>
                        
                                </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="essb_break_scroll"></div>
                </div>
            </div>
        </div>
    </div>
    
</div>
</div>
@endsection    
        













