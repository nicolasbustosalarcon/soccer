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
                                            <h5>Todos los Partidos<img class="float-right" src="{{asset('images/torneos/iconos/partidos.png')}}" width="40" height="40"></h5>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">
                                                <div class="row">
                                                    <div class="col">
                                                    
                                                        
                                                        @foreach($partidos as $parti)
                                                            <div class="row">
                                                                @foreach($clubes as $club)
                                                                    @if (strcmp($parti->clubLocalPartido, $club->idClub) === 0)
                                                                    
                                                                        <div class="col ">
                                                                            <p><td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive float-sm-right" style="width:60px !important; height:60px !important"></td></p>
                                                                        </div>
                                                                   
                                                                    @endif
                                                                @endforeach
                                                                <div class="row"> 
                                                                    <div class="col">
                                                                     <p>
                                                                        <h3>{{ $parti['golesLocalPartido'] }} - {{ $parti['golesVisitaPartido'] }}</h3>  
                                                                    </p>  
                                                                    </div>   
                                                                </div>    
                                                                @foreach($clubes as $club)
                                                                    @if (strcmp($parti->clubVisitaPartido, $club->idClub) === 0)
                                                                        <div class="col">
                                                                            <p><td><img src="{{asset('images/club/' .$club->imagenClub)}}" class="img-responsive" style="width:60px !important; height:60px !important"></td></p>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
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
                                            <h5>Toda la información de partidos la encuentras aquí<img class="float-right" src="imagenes/inicio/escudoinicio.png" width="30" height="30"></h5>
                                        </div>
                                        <div class="card-body">
                                            <img class="card-img" src="{{asset('images/torneos/iconos/Pitana.jpg')}}" alt="Card image" width="100" height="500">                                               
                                        </div>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <p></p>
                                    <div class="card text-white bg-secondary mb-3" >
                                        <div class="card-header">
                                            <h5>Calendario<img class="float-right" src="{{asset('images/torneos/iconos/calendario.png')}}" width="35" height="35"></h5>
                                        </div>
                                        <div class="card-body">
                                            

                                            <div class="row">
                                                <div class="col">


                                                 

                                                  <div class="row header-calendar">

                                                    <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
                                                      <a  href="" style="margin:10px;">
                                                        <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
                                                      </a>
                                                      <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
                                                      <a  href="" style="margin:10px;">
                                                        <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
                                                      </a>
                                                    </div>

                                                  </div>
                                                  <div class="row">

                                                    <div class="col header-col">L</div>
                                                    <div class="col header-col">M</div>
                                                    <div class="col header-col">Mi</div>
                                                    <div class="col header-col">J</div>
                                                    <div class="col header-col">V</div>
                                                    <div class="col header-col">S</div>
                                                    <div class="col header-col">D</div>
                                                  </div>
                                                  <!-- inicio de semana -->
                                                  <!-- inicio de semana -->
                                                      @foreach ($data['calendar'] as $weekdata)
                                                        <div class="row">
                                                          <!-- ciclo de dia por semana -->
                                                          @foreach  ($weekdata['datos'] as $dayweek)

                                                          @if  ($dayweek['mes']==$mes)
                                                            <div class="col box-day">
                                                              {{ $dayweek['dia']  }}
                                                            </div>
                                                          @else
                                                          <div class="col box-dayoff">
                                                          </div>
                                                          @endif


                                                          @endforeach
                                                        </div>
                                                      @endforeach
                                                    
                                                </div>

</div>

                                                <!--
                                                <form class="form-group-center" method="POST" action="fecha"> 
                                                    @csrf
                                                    <div class="row">
                                                        <input type="date" name="fechaPartidos" class="form-control" required>
                                                    </div>
                                                    <p></p>
                                                    <div class="row">
                                                        <button type="submit" class="btn btn-primary">Ver Partidos</button>
                                                    </div>
                                                </form>
                                                -->                                      
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
