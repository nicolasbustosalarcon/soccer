@extends ('layouts.app')

@section ('title', 'Torneos')

@section ('content')

<div class="row">
    <div class="col">
        <div class="card bg-dark text-white">
            <img class="card-img" src="{{asset('images/torneos/iconos/calendario_fondo.jpg')}}" alt="Card image" width="1100" height="300">
        </div>
    </div>
</div>
    <div class="row">
    <div class="col">
         <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link text-muted" href="#tab2default" data-toggle="tab">Partidos</a>
                    </li>
                </ul>
            </div>
            <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab2default">
                            <div class="row">
                                <div class="col">
                                    <p></p>
                                    <div class="card text-white bg-secondary mb-3" >
                                        <div class="card-header">
                                            <h5>Partidos<img class="float-right" src="{{asset('images/torneos/iconos/partidos.png')}}" width="40" height="40"></h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                <div class="row">
                                                    <div class="row">
                                                        @foreach($partidos as $parti)
                                                            @foreach($clubes as $club)
                                                                
	                                                                   <div class="col-2">
	                                                                        <p><td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:40px !important; height:40px !important"></td></p>
	                                                                    </div>
	                                                                
                                                            @endforeach
                                                            <div class="col-2"> 
                                                                
	                                                            	<p>
                                                                    	<h3>{{ $parti['golesLocalPartido'] }} - {{ $parti['golesVisitaPartido'] }}</h3>  
                                                                	</p>
	                                                            
                                                            </div>    
                                                            @foreach($clubes as $club)
	                                                                   <div class="col-2">
	                                                                        <p><td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:40px !important; height:40px !important"></td></p>
	                                                                    </div>
                                                            @endforeach
                                                        @endforeach
                                                    </div>  
                                                </div>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <p></p>
                                    <div class="card text-white bg-secondary mb-3" >
                                        <div class="card-header">
                                            <h5>Calendario<img class="float-right" src="{{asset('images/torneos/iconos/calendario.png')}}" width="35" height="35"></h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="col">
                                                <form class="form-group" method="POST" action="fecha"> 
                                                	@csrf
                                                    <div class="col-6">
                                                        <input type="date" name="fechaPartidos" class="form-control" required>
                                                    </div>
                                                    <div class="col-6">
                                                        <button type="submit" class="btn btn-primary">Ver Partidos</button>
                                                    </div>
                                               	</form>
                                            </div>                                            
                                        </div>
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>           
        </div>
    </div>
    <p>.</p>
</div>

<div class="row">
    <div class="col">
            <a href="../../partido"><button class='btn btn-danger'>Atrás</button></a>
    </div>
</div>
</div>
@endsection
