
@extends ('layouts.app')

@section ('titulo', 'Jugador' .$jugadores->idJugador)

@section ('content')
<div class="col">
    <div class="row">
        @if(auth()->user()->authorizeRolesLogin('admin')) 
            <a href="{{ route('imprimir.reporte', $jugadores->idJugador)}}" class="btn btn-outline-success my-2 my-sm-0">Generar reporte</a>
        @endif
    </div>
</div>

<section id="player" class="container">
    <div class="row">
        <div class="player col-sm-9">
            <div class="row">
                <div class="player-image col-sm-5">
                    <img src="{{asset('images/jugador/' .$jugadores->imagenJugador)}}" class="border border-warning" height="353x" width="320px">
                    <span class="gradient" ></span>
                </div>
                <div class="col-sm-7 border border-warning">
                    <div class="player-data text-white">
                    	<?php
                    	$x = 0;
                    	?>
                    	@foreach($trayectorias as $t)
                    	@if($t->idClub === $jugadores->idClub)
                    	@if($x === 0)
                        <div class="text-center">{{$t->camisetaJugador}}</div>
                        <?php
                        $x = 1;
                        ?>
                        @endif
                        @endif
                        @endforeach
                        <h1>{{$jugadores->nombreJugador}} {{$jugadores->apellidosJugador}}</h1>
                        <h2>Posición: {{$jugadores->posicionJugador}}</h2>
                    </div>
                    <div class="row">
                    	<ul class="player-list text-white">
                    		<li class="b-day">Fecha de Nacimiento: <span>{{$jugadores->nacimientoJugador}}</span><br>
                    			
                    		</li>
                    		<li class="weight">Peso: <span>{{$jugadores->pesoJugador}}kg.</span><br>
                    			
                    		</li>
                    		<li class="height">Altura: <span>{{$jugadores->alturaJugador}}Mt.</span><br>
                    			
                    		</li>
                    		<li class="origin">Edad: <span>{{$jugadores->edadJugador}}</span><br>
                    			
                    		</li>
                    		@foreach($paises as $pais)
                    		@if($jugadores->idPais === $pais->idPais)
                    		<li class="country">Nacionalidad: <span>{{$pais->nombrePais}}</span><br>
                    			
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
            <div class="row">
            	<div class="container">
            		<h2>Trayectoria</h2>
                    <div class="col">
                    @if(auth()->user()->authorizeRolesLogin('admin')) 
                        <a href="{{ route('trayectoriajugador.create', $jugadores->idJugador)}}" class="btn btn-outline-info my-2 my-sm-0">Crear Trayectoria</a>
                    @endif
                </div>
            	</div>
            	<div class="container">
            		<div class="row">
            			@foreach($trayectorias as $t)
            			<div class="col-sm">
            				<th><a class="text-white" href="{{ route('club.show', $t->idClub)}}"><img src="{{asset('images/club/' .$t->imagen)}}" class="img-responsive" style="width:21px !important; height:21px !important">  {{$t->nombreClub}}</th></a>            	
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
                <p></p>
                <p>.</p>
            </div>
        </div>
        </div>
    </div>
</section>
	
		
















	

@endsection