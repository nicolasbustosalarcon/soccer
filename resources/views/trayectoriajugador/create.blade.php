
@extends ('layouts.app')

@section ('titulo', 'Trayectoria Create -' .$jugadores->idJugador)

@section ('content')
    

    
        <div class="row">
            <div class="col text-white">
                <h1>Ficha</h1>
            </div>
        </div>
        <div class="row text-white">
            <div class="col">
                <img src="{{asset('images/jugador/' .$jugadores->imagenJugador)}}" class="img-responsive float-sm-right align-self-start" style="width:15% !important">
                <p><b>Nombre Completo:</b>    {{$jugadores->nombreJugador}} {{$jugadores->apellidosJugador}}</p>
                @foreach($paises as $pais)
                    @if($jugadores->idPais === $pais->idPais)
                        <p><b>Nacionalidad: </b>      {{$pais->nombrePais}}</p>
                    @endif
                @endforeach
                <p><b>Edad: </b>      {{$jugadores->edadJugador}}</p>
                <p><b>Fecha de Nacimiento: </b>   {{$jugadores->nacimientoJugador}}</p>

                <p><b>Posición: </b>  {{$jugadores->posicionJugador}}</p>
                <p><b>Altura: </b>    {{$jugadores->alturaJugador}} cm.</p>
                <p><b>Peso: </b>      {{$jugadores->pesoJugador}} kg.</p>
                <p><b>Pie: </b>       {{$jugadores->pieJugador}}</p>


            </div>
        </div>

        <div class="row text-white">
            <div class="col">
                <div class="col-4">
                <form class="form-group text-white" method="POST" action="/trayectoriajugador" enctype="multipart/form-data">
                    @csrf
                
                        <h3>Agregar Trayectoria</h3>
                        <input type="hidden" name="idJugador" value="{{$jugadores->idJugador}}" class="form-control">

                        <label>Club</label>
                            <select name="idClub" class="form-control">
                                <option disabled selected value>Seleciona un Club...</option>
                                @foreach ($clubes as $club)
                                    
                                        <option value="{{$club->idClub}}">{{$club->nombreClub}}</option>
                                    
                                @endforeach
                            </select>

                        <label>Torneo</label>
                            <select name="idTorneo" class="form-control">
                                <option disabled selected value>Seleciona un Torneo...</option>
                                    @foreach($torneos as $tor)
                                        <option value="{{$tor->idTorneo}}">{{$tor->nombreTorneo}}</option>
                                    @endforeach
                                    
                                
                            </select>

                        <label>Número Camiseta</label>
                            <input type="text" name="camisetaJugador" placeholder="Ingrese un número" class="form-control">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                </div>
                



            </div>
        </div>

        <div class="row">
            <div class="col text-white">
                <h1>Trayectoria</h1>
            </div>
        </div>

        <div class="row">
            <div class="col text-white">
                
                        <table class="table table-striped text-white">

                            <thead>
                                <td>Año</td>
                                <td>Torneo</td>
                                <td>Club</td>
                                <td>Número de camiseta</td>
                            </thead>
                            @foreach($trayectorias as $tra)
                                @if($tra->idJugador === $jugadores->idJugador)
                                    <tbody>
                                        @foreach($torneos as $tor)
                                             @if($tra->idTorneo === $tor->idTorneo)
                                                <td>{{$tor->edicion}}</td>
                                                <td><a href="{{ route('torneo.show', $tor->idTorneo)}}" class="text-white">{{$tor->nombreTorneo}}</a></td>
                                            @endif
                                        @endforeach

                                        @foreach($clubes as $club)
                                            @if($tra->idClub === $club->idClub)
                                                <td><a href="{{ route('club.show', $club->idClub)}}" class="text-white">{{$club->nombreClub}}</a></td>
                                            @endif
                                        @endforeach
                                        <td>{{$tra->camisetaJugador}}</td>      
                                    </tbody>
                                @endif
                            @endforeach
                        </table>
            <div class="row">
                <div class="col">
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>
                        
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p>
                        
                    </p>
                </div>
            </div>


               
            </div>
        </div>


                        
             
           
            
    

@endsection

