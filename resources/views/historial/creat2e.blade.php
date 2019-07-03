
@extends ('layouts.app')

@section ('titulo', 'Historial Create -' .$partidos->idPartido)

@section ('content')
    

        <div class="row border justify-content-center">
            @foreach($clubes as $club)
                @if (strcmp($partidos->clubLocalPartido, $club->idClub) === 0)

                    <div class="col-4">
        

                        <p><td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:90px !important; height:90px !important"></td> {{ $club['nombreClub'] }}</p>
                    </div>
                @endif
            @endforeach
                    <div class="col-2 align-self-center">
                        <p> <h3>{{ $partidos['golesLocalPartido'] }} - {{ $partidos['golesVisitaPartido'] }}</h3></p>
                    </div>
            @foreach($clubes as $club)  
                @if($partidos->clubVisitaPartido === $club->idClub)
                    <div class="col-4">
                        <p>{{ $club['nombreClub'] }} <td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:90px !important; height:90px !important"></td></p>
                        
                    </div>
                @endif
            @endforeach
        
        </div>

        <div class="row border justify-content-center">
            <h1>INFO</h1>
            <div class="col">
                @foreach($torneos as $tor)
                    @foreach($estadios as $est)
                        @if (strcmp($partidos->idTorneo, $tor->idTorneo) === 0)
                            @if (strcmp($partidos->idEstadio, $est->idEstadio) === 0)


                                <p> Competición {{ $tor['nombreTorneo'] }}</p>
                                
                                <p> Fecha {{ $partidos['fechaPartido'] }}</p>
                                <p> Hora {{ $partidos['horaPartido'] }}</p>

                                <p> Estadio {{ $est['nombreEstadio'] }}</p>
                                <p> Estado {{ $partidos['estadoPartido'] }}</p>
                        @endif
                        @endif
                    @endforeach
                @endforeach

            </div>
        </div>


   

    
            <!-- Valida para que no se muestren jugadores si se suspendió el partido o no se ha jugado-->

            <div class="row border justify-content-center">

                <h1>Plantillas</h1>
                

            </div>

            <div class="col">
                <div class="row justify-content-around">

                    <!------------Ingresar Plantilla Local------------------------>
                    <div class="col-4">
                        <form class="form-group" method="POST" action="/historial" enctype="multipart/form-data"> 
                        @csrf

                        <input type="hidden" name="idPartido" value="{{$partidos->idPartido}}" class="form-control">
                        
                        <label>Club Local</label>
                            <select name="idJugador" class="form-control">
                                <option disabled selected value>Seleciona un Jugador...</option>
                                @foreach ($jugadorclub as $jc)
                                    @if($jc->idClub === $partidos->clubLocalPartido)
                                        <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Guardar</button>

                        </form>    
                    </div>

                     
                    <!----------------------------------------------------->
                    
                                    
                    <!-----------Plantilla Visita--------------------------->
                    <div class="col-4" align="right">
                        <form class="form-group" method="POST" action="/historial" enctype="multipart/form-data"> 
                        @csrf
                         <input type="hidden" name="idPartido" value="{{$partidos->idPartido}}" class="form-control">

                        <label>Club Visita</label>
                            <select name="idJugador" class="form-control">
                            <option disabled selected value>Seleciona un Jugador...</option>
                            @foreach ($jugadorclub as $jc)
                                @if($jc->idClub === $partidos->clubVisitaPartido)
                                    <option value="{{$jc->idJugador}}">{{$jc->nombreJugador}} {{$jc->apellidosJugador}}</option>
                                @endif
                            @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                             </form>  
                    </div>
                    <!----------------------------------------------------->

                </div>
                    </div>
           
            
    

@endsection