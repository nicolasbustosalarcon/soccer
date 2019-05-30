
@extends ('layouts.app')

@section ('titulo', 'Partidos')

@section ('content')
    <div class="col">
        <div class="row ">
            @foreach($club as $clu)
                <div>
                    <a href="{{ route('club.show', $clu->idClub)}}" class="text-dark">
                        <span>{{ $clu->nombreClub}}</span>
                        <img src="{{asset('images/club/' .$clu->imagenClub)}}" class="img-responsive" style="width:50px !important; height:50px !important">
                    </a>
                </div>
        	@endforeach
        </div>
        <div class="row">
        	<a href="../../partido"><button class="btn btn-danger">Volver</button> </a>
        </div>
    </div>
@endsection