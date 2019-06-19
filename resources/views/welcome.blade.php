@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="row">
    <div class="col">
        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="imagenes/inicio/estadio1.png" style="height: 300px;" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="height: 300px;" src="https://k03.kn3.net/taringa/3/9/6/9/2/4//aguantlat/E54.jpg" alt="Second slide">
                    </div>
                <div class="carousel-item">
                    <img class="d-block w-100" style="height: 300px;" src="https://borjagomezfotografia.files.wordpress.com/2012/04/img_0861-panorama.jpg" alt="Third slide">
                </div>
            </div>
             <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col text-light text-center">
        <p></p>
        <h2><a class="text-warning" href="/login">Inicia sesión</a> para ingresar al mundo de <img class="w-5" src="imagenes/inicio/escudoinicio.png"><p>Información sobre:</p></h2>
        <p></p>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="text-center">
            <a href="/login" ><img src="imagenes/inicio/escudo.png" width="100" height="100"><p class="text-light">Clubes</p></a>
        </div>
    </div>
    <div class="col">
        <div class="text-center">
            <a href="/login" ><img src="imagenes/inicio/perfil.png" width="100" height="100"><p class="text-light">Jugadores</p></a>
        </div>
    </div>
    <div class="col">
        <div class="text-center">
            <a href="/login" ><img src="imagenes/inicio/trofeo.png" width="100" height="100"><p class="text-light">Competiciones</p></a>
        </div>
    </div>
    <div class="col text-center">
        <div>
            <a href="/login" ><img src="https://cdn.pixabay.com/photo/2014/04/02/17/08/globe-308065_640.png" width="100" height="100"><p class="text-light">Paises</p></a>
        </div>
    </div>
    <div class="col">
        <div class="text-center">
            <a href="/login" ><img src="imagenes/inicio/estadio.png" width="100" height="100"><p class="text-light">Estadios</p></a>
        </div>
    </div>
    <div class="col">
        <div class="text-center">
            <a href="/login" ><img src="imagenes/inicio/partidos.png" width="100" height="100"><p class="text-light">Partidos</p></a>
        </div>
    </div>

</div>
<p>.</p>

@endsection