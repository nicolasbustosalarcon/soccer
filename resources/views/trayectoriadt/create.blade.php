
@extends ('layouts.app')

@section ('titulo', 'Trayectoria DT Create -' .$dts->idDirectorTecnico)

@section ('content')
    

    
        <div class="row">
            <div class="col text-white">
                <h1>Ficha</h1>
            </div>
        </div>
        <div class="row text-white">
            <div class="col">
                
                <p><b>Nombre Completo:</b>    {{$dts->nombreDirectorTecnico}} {{$dts->apellidosDirectorTecnico}}</p>
                @foreach($paises as $pais)
                    @if($dts->idPais === $pais->idPais)
                        <p><b>Nacionalidad: </b>      {{$pais->nombrePais}}</p>
                    @endif
                @endforeach
                <p><b>Edad: </b>      {{$dts->edadDirectorTecnico}}</p>
                <p><b>Fecha de Nacimiento: </b>   {{$dts->nacimientoDirectorTecnico}}</p>



            </div>
        </div>

        <div class="row text-white">
            <div class="col">
                <div class="col-4">
                <form class="form-group text-white" method="POST" action="/trayectoriadt" enctype="multipart/form-data">
                    @csrf
                
                        <h3>Agregar Trayectoria</h3>
                        <input type="hidden" name="idDirectorTecnico" value="{{$dts->idDirectorTecnico}}" class="form-control">

                        <label>Club</label>
                            <select name="idClub" class="form-control">
                                <option disabled selected value>Seleciona un Club...</option>
                                @foreach ($clubes as $club)
                                    
                                        <option value="{{$club->idClub}}">{{$club->nombreClub}}</option>
                                    
                                @endforeach
                            </select>

                        
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
                                
                               
                                <td>Club</td>
                                
                            </thead>
                            @foreach($trayectorias as $tra)
                                @if($tra->idDirectorTecnico === $dts->idDirectorTecnico)
                                    <tbody>
                                        

                                        @foreach($clubes as $club)
                                            @if($tra->idClub === $club->idClub)
                                                <td><a href="{{ route('club.show', $club->idClub)}}" class="text-white">{{$club->nombreClub}}</a></td>
                                            @endif
                                        @endforeach
                                          
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

