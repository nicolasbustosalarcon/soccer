<!--<div class="row">
            <div class="col">
                <h1>Ficha</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <img src="{{asset('images/jugador/' .$jugadores->imagenJugador)}}" class="img-responsive float-sm-right align-self-start" style="width:15% !important">
                <p><b>Nombre</b>    {{$jugadores->nombreJugador}}</p>
                <p><b>Apellidos</b> {{$jugadores->apellidosJugador}}</p>
                @foreach($paises as $pais)
                    @if($jugadores->idPais === $pais->idPais)
                        <p><b>Nacionalidad</b>      {{$pais->nombrePais}}</p>
                    @endif
                @endforeach
                <p><b>Edad</b>      {{$jugadores->edadJugador}}</p>
                <p><b>Fecha de Nacimiento</b>   {{$jugadores->nacimientoJugador}}</p>

                <p><b>Posición</b>  {{$jugadores->posicionJugador}}</p>
                <p><b>Altura</b>    {{$jugadores->alturaJugador}} cm.</p>
                <p><b>Peso</b>      {{$jugadores->pesoJugador}} kg.</p>
                <p><b>Pie</b>       {{$jugadores->pieJugador}}</p>


            </div>
        </div>

        <div class="row">
            <div class="col">
                @if(auth()->user()->authorizeRolesLogin('user')) 
                    <a href="{{ route('trayectoriajugador.create', $jugadores->idJugador)}}" class="btn btn-default">crear Trayectoria</a>

                @endif
            </div>
        </div>

        <div class="row">
            <div class="col">
                <h1>Trayectoria</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                
                        <table class="table table-striped">
                            <thead>
                                <td>Año</td>
                                <td>Torneo</td>
                                <td>Club</td>
                                <td>Número de camiseta</td>
                                <td>Acción</td>
                            </thead>
                            
                                @foreach($trayectorias as $tra)
                                    @if($tra->idJugador === $jugadores->idJugador)
                                        <tbody>
                                            @foreach($torneos as $tor)
                                                @if($tra->idTorneo === $tor->idTorneo)
                                                    <td>{{$tor->edicion}}</td>
                                                    <td><a href="{{ route('torneo.show', $tor->idTorneo)}}" class="text-dark">{{$tor->nombreTorneo}}</a></td>
                                                @endif
                                            @endforeach

                                            @foreach($clubes as $club)
                                                @if($tra->idClub === $club->idClub)
                                                    <td><a href="{{ route('club.show', $club->idClub)}}" class="text-dark">{{$club->nombreClub}}</a></td>
                                                @endif
                                            @endforeach
                                            <td>{{$tra->camisetaJugador}}</td>
                                            <td>--><!--a href="/trayectoriajugador/{{$tra->idTrayectoriaJugador}}/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span>Editar</a-->
                            <!--<a href="{{ route('trayectoriajugador.destroy', $tra->idTrayectoriaJugador)}}" onclick="return confirm('¿Estás seguro que deseas eliminarlo?')" class="btn btn-danger">Eliminar</a></td>
                                        </tbody>
                                    @endif
                                @endforeach
                            
                        </table>

                    
            </div>
        </div>-->



