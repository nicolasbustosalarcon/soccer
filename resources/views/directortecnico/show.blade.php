@extends ('layouts.app')

@section ('titulo', 'Jugador' .$directortecnico->idDirectorTecnico)

@section ('content')

<div id="player" class="container">
    <div class="row">
        <div class="player col-sm-9">
            <div class="row">
                <div class="player-image col-sm-5">
                    <img src="{{asset('images/jugador/' .$directortecnico->imagenDirectorTecnic)}}" class="border border-warning" height="353x" width="320px">
                    <span class="gradient" ></span>
                </div>
                <div class="col-sm-7 border border-warning">
                    <div class="player-data text-white">
                        <h1>{{$directortecnico->nombreDirectorTecnico}} {{$directortecnico->apellidosDirectorTecnico}}</h1>
                        
                    </div>
                    <div class="row">
                        <ul class="player-list text-white">
                            <li class="b-day">Fecha de Nacimiento<br>
                                <span>{{$directortecnico->nacimientoDirectorTecnico}}</span>
                            </li>
                            <li class="origin">Edad<br>
                                <span>{{$directortecnico->edadDirectorTecnico}}</span>
                            </li>
                            @foreach($paises as $pais)
                            @if($directortecnico->idPais === $pais->idPais)
                            <li class="country">Nacionalidad<br>
                                <span>{{$pais->nombrePais}}</span>
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
    <div class="row">
        <div class="related col-md-8 text-white">
            <h2>Contenidos sobre {{$directortecnico->nombreDirectorTecnico}} {{$directortecnico->apellidosDirectorTecnico}}</h2>
            <div class="row">
                <div class="container">
                    <h4>Trayectoria</h4>
                </div>
                <div class="container">
                    <div class="row">
                        @foreach($trayectorias as $t)
                        <div class="col-sm">
                            <th>{{$t->nombreClub}}</th>
                            <th><img src="{{asset('images/club/' .$t->imagen)}}" class="img-responsive" style="width:21px !important; height:21px !important">
                            </th>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!--<article class="col-sm-3">
                    <a href="https://www.udechile.cl/johnny-herrera-y-empate-ante-everton-estamos-firmes-y-ultra-claros-que-tenemos-un-plantel-para-salir-de-este-mal-momento/">
                        <div class="thumbnail">
                            <img src="https://www.udechile.cl/wp-content/uploads/2019/04/johnny-380x200.jpg">
                        </div>
                        <h1>Johnny Herrera y empate ante Everton: “Estamos firmes y ultra claros que tenemos un plantel para salir de este mal momento”</h1>
                    </a>
                </article>
                <article class="col-sm-3">
                    <a href="https://www.udechile.cl/las-declaraciones-de-torres-y-herrera-tras-la-derrota-ante-union-espanola/">
                        <div class="thumbnail">
                            <img src="https://www.udechile.cl/wp-content/uploads/2019/03/0S7A3498-380x200.jpg">
                        </div>
                        <h1>Las declaraciones de Torres y Herrera tras la caída frente a Unión Española</h1>
                    </a>
                </article>
                <article class="col-sm-3">
                    <a href="https://www.udechile.cl/la-goleada-desde-adentro-revive-todo-lo-que-paso-en-el-triunfo-sobre-huachipato/">
                        <div class="thumbnail">
                            <img src="https://www.udechile.cl/wp-content/uploads/2019/03/foto-web-gol-herrera-380x200.jpg">
                        </div>
                        <h1>🎥 La goleada desde adentro: Revive todo lo que pasó en el triunfo sobre Huachipato</h1>
                    </a>
                </article>
            </div>-->
            <div class="row">
            <div class="col">
                @if(auth()->user()->authorizeRolesLogin('admin')) 
                    <a href="{{ route('imprimir.reporte_dt',$directortecnico->idDirectorTecnico)}}" class="btn btn-outline-success my-2 my-sm-0">Generar reporte</a>
                @endif
            </div>
        </div>
        </div>
    </div>
</div>
</div>
@endsection    
        













