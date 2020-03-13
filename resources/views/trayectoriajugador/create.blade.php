
@extends ('layouts.app')

@section ('titulo', 'Trayectoria Create' )

@section ('content')
    
<!--
    
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
-->






    
        
<div class="row">
    
        <div class="col-3  d-flex align-content-around flex-wrap" >
            
                
                <div class="col-12 pt-1 text-center text-white align-self-start">
                    <h4><strong>{{$jugadores->nombreJugador}} {{$jugadores->apellidosJugador}}</strong></h4>
                </div>

                <div class="col-12 pt-1 text-center text-white align-self-center">
                    <img src="{{asset('images/jugador/' .$jugadores->imagenJugador)}}"  height="150px" width="150px">
                </div>
                    
                <div class="col-12 pt-3 text-center text-white align-self-end">
                    @foreach($trayectorias as $t)
                        @if ($t->idClub === $jugadores->idClub)
                            
                          <h5><strong><img src="{{asset('images/club/' .$t->imagen)}}" class="img-responsive" style="width:40px !important; height:40px !important"></strong></h5>
                        @endif
                    @endforeach
                </div>
            
        </div>

        <div class="col-9">
            <table class="table table-secondary table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>DATOS JUGADOR</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Nombre</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->nombreJugador}} {{$jugadores->apellidosJugador}}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Fecha de nacimiento</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->nacimientoJugador}} ({{$jugadores->edadJugador}} años)
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Posición</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->posicionJugador}}
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Pierna Hábil</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->pieJugador}}
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Altura</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->alturaJugador}} cm.
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>Peso</small>
                                </div>
                                <div class="col-12">
                                    {{$jugadores->pesoJugador}} kg.
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-12 text-secondary">
                                    <small>País</small>
                                </div>
                                <div class="col-12">
                                    @foreach ($paises as $pais)
                                        @if ($pais->idPais === $jugadores->idPais)
                                            {{$pais->nombrePais}}
                                        @endif
                                    @endforeach
                                    
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
</div>

<div class="row">
    <div class="col">
        <table class="table table-warning table-striped">
                <thead class="table-warning bg-warning">
                    <tr>
                        <th>TRAYECTORIA JUGADOR</th>
                        <th> @if(auth()->user()->authorizeRolesLogin('admin')) 
                      
                    @endif</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                         <div class="row">
                                    <div class="col-12 text-secondary">
                                        <small>Temporada</small>
                                    </div>
                                    
                                </div>
                            </td>
                        <td>
                         <div class="row">
                                    <div class="col-12 text-secondary">
                                        <small>Club</small>
                                    </div>
                                    
                                </div>
                            </td>
                        <td>
                         <div class="row">
                                    <div class="col-12 text-secondary">
                                        <small>Torneo</small>
                                    </div>
                                    
                                </div>
                            </td>
                        <td>
                         <div class="row">
                                    <div class="col-12 text-secondary">
                                        <small>Camiseta</small>
                                    </div>
                                    
                                </div>
                            </td>
                    </tr>
                @foreach ($trayectorias as $t)
                    
                
                    <tr>
                        <td>
                             @foreach ($torneos as $tor)
                                @if ($t->idTorneo === $tor->idTorneo)
                                <div class="row">
                                  
                                    <div class="col-12">
                                        {{$tor->edicion}} 
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($clubes as $club)
                                @if ($t->idClub === $club->idClub)
                                    
                            <div class="row">
                                
                                <div class="col-12">
                                    {{$club->nombreClub}} 
                                </div>
                            </div>
                            {{-- expr --}}
                                @endif
                            @endforeach
                        </td>
                        <td>
                             @foreach ($torneos as $tor)
                                @if ($t->idTorneo === $tor->idTorneo)
                                <div class="row">
                                    
                                    <div class="col-12">
                                        {{$tor->nombreTorneo}} 
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </td>

                        <td>
                            <div class="row">
                                
                                <div class="col-12">
                                   # {{$t->camisetaJugador}} 
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                   
                </tbody>
            </table>
            
    </div>

    
</div>


        <form class="form-group text-white" method="POST" action="/trayectoriajugador" enctype="multipart/form-data">
            @csrf
            <div class="row">
                
                <div class="col">
                    <h6 class="text-white ">Ingresar nuevo Equipo</h6>
                </div>
        
                <input type="hidden" name="idJugador" value="{{$jugadores->idJugador}}" class="form-control">
       
                <div class="col">
                    <select name="idClub" class="form-control">
                        <option disabled selected value>Seleciona un Club...</option>
                        @foreach ($clubes as $club)
                            
                                <option value="{{$club->idClub}}">{{$club->nombreClub}}</option>
                            
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <select name="idTorneo" class="form-control">
                        <option disabled selected value>Seleciona un Torneo...</option>
                            @foreach($torneos as $tor)
                                <option value="{{$tor->idTorneo}}">{{$tor->nombreTorneo}}</option>
                            @endforeach
                            
                        
                    </select>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col-9">
                            <input type="text" name="camisetaJugador" placeholder="Número de Camiseta" class="form-control">

                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-success">OK</button>

                        </div>
                    </div>
                    </div>
</div>

            </form>














    
<div class="row">
    <div class="col">
        <p></p>
        <p>.</p>
    </div>
</div>
@endsection

                        
             
           
            
    


