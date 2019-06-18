@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="row">
    <div class="col-3">
        
    </div>
    <div class="col-2">
        <div class="text-center">
            <a href="/" ><img src="imagenes/inicio/escudo.png" width="100" height="100"><p class="text-light">Clubes</p></a>
        </div>
    </div>
    <div class="col-2">
        <div class="text-center">
            <a href="/" ><img src="imagenes/inicio/perfil.png" width="100" height="100"><p class="text-light">Jugadores</p></a>
        </div>
    </div>
    <div class="col-2">
        <div class="text-center">
            <a href="/torneo" ><img src="imagenes/inicio/trofeo.png" width="100" height="100"><p class="text-light">Competiciones</p></a>
        </div>
    </div>
    <div class="col-3">
        <div class="text-center">
            <span></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-3">
        
    </div>
    <div class="col-2">
        <div class="text-center">
            <a href="/" ><img src="https://cdn.pixabay.com/photo/2014/04/02/17/08/globe-308065_640.png" width="100" height="100"><p class="text-light">Paises</p></a>
        </div>
    </div>
    <div class="col-2">
        <div class="text-center">
            <a href="/" ><img src="imagenes/inicio/estadio.png" width="100" height="100"><p class="text-light">Estadios</p></a>
        </div>
    </div>
    <div class="col-2">
        <div class="text-center">
            <a href="/" ><img src="imagenes/inicio/partidos.png" width="100" height="100"><p class="text-light">Partidos</p></a>
        </div>
    </div>
    <div class="col-3">
        <div class="text-center">
            <span></span>
        </div>
    </div>
    <!--div class="col-12">
        <div class="text-center">
            <a href="/configuraciones" ><img src="https://image.flaticon.com/icons/svg/44/44520.svg" width="100" height="100"><p class="text-light">Configuración</p></a>            
        </div>
    </div-->
</div>
@endsection