
@extends ('layouts.app')

@section ('titulo', 'Partidos')

@section ('content')
    <div class="row">
        <div class="col-sm-6 text-white" >
                <h3>Clubes</h3>
                
                
                    @foreach($club as $clu)
                        @if($clu->idClub !== null)
                            <div>
                                <a href="{{ route('club.show', $clu->idClub)}}" class="text-white">
                                    <span>{{ $clu->nombreClub}}</span>
                                    <img src="{{asset('images/club/' .$clu->imagenClub)}}" class="img-responsive" style="width:25px !important; height:25px !important">
                                </a>
                            </div>
                        @else
                            <div>
                                <a><span>No hay información relacionada</span></a>
                            </div>
                        @endif
                    @endforeach
                  
        </div>
        <div class="col-sm-6 text-white">
                    <h3>Jugadores</h3>
                        @if($jugadores === null)
                                <div>
                                    <a>No hay información relacionada</a>
                                </div>
                        @else
                            @foreach($jugadores as $jug)
                                <div>
                                    <a href="{{ route('jugador.show', $jug->idJugador)}}" class="text-white">
                                        <span>{{ $jug->nombreJugador}} {{$jug->apellidosJugador}}</span>
                                        <img src="{{asset('images/jugador/' .$jug->imagenJugador)}}" class="img-responsive" style="width:25px !important; height:25px !important">
                                    </a>
                                </div>
                            @endforeach
                        @endif
        </div>
    </div>
    <div class="text-white">
        <h3>-------------------------------------------------------------------------------------------------------</h3>
    </div>
    <div class="row">
        <div class="col-sm-6 text-white">
                <h3>Torneos</h3>
                @if($torneos == NULL)
                        <div>
                            <a>No hay información relacionada</a>
                        </div>
                @else
                    @foreach($torneos as $tor)
                        <div>
                            <a href="{{ route('torneo.show', $tor->idTorneo)}}" class="text-white">
                                <span>{{ $tor->nombreTorneo}}</span>
                               
                            </a>
                        </div>
                    @endforeach
                @endif  
        </div>
        <div class="col-sm-6 text-white">
                    <h3>Estadios</h3>
                        @if($estadios == NULL)
                                <div>
                                    <a>No hay información relacionada</a>
                                </div>
                        @else
                            @foreach($estadios as $est)
                                <div>
                                   <a href="{{ route('estadio.show', $est->idEstadio)}}" class="text-white">
                                        <span>{{ $est->nombreEstadio}}</span>
                                    </a>
                                </div>
                            @endforeach
                        @endif
        </div>
    </div>
    <div class="text-white">
        <h3>-------------------------------------------------------------------------------------------------------</h3>
    </div>

    <div class="col">
    	<a href="../../partido"><button class="btn btn-danger">Volver</button> </a>
    </div>
    
@endsection