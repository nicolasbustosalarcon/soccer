<html>
<head>
  <style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: 160px 50px;
    }
    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 130px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
  </style>


<body>
  <header>
    <h2>
      @foreach($clubes as $club)
       @if (strcmp($partidos->clubLocalPartido, $club->idClub) === 0)
         {{ $club['nombreClub'] }} {{$partidos->golesLocalPartido}}
        @endif
      @endforeach
    </h2>
    <h3>vs</h3>
    <h2>
      @foreach($clubes as $club)
        @if($club->idClub === $partidos->clubVisitaPartido)
          {{$club->nombreClub}} {{$partidos->golesVisitaPartido}}
        @endif
      @endforeach
    </h2>
  </header>
  <footer>
    <table>
      <tr>
        <td>
            <p class="izq">
                4-4-2
            </p>
        </td>
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>
  <div id="content">
    <h2>
      Datos del Partido
    </h2>
    <p>
      @foreach($arbitros as $arb)
      @if($partidos->idArbitroCentral === $arb->idArbitro)
      <b>Arbitro central:</b> {{ $arb['nombreArbitro'] }}  {{ $arb['apellidosArbitro'] }}
      @endif
      @endforeach
    </p>
    
    <p>
      @foreach($estadios as $est)
      @if($partidos->idEstadio === $est->idEstadio)
      <b>Estadio:</b> {{$est->nombreEstadio}}
      @endif
      @endforeach
    </p>
    
    </p>
    <p>
      <b>Fecha:</b> {{$partidos->fechaPartido}}
    </p>
    <p>
      <b>Hora:</b> {{$partidos->horaPartido}}
    </p>
    <br>
    <h2>Alineaciones</h2>
    <p>
      
      <?php
      $local = false;
      $visita = false;
      ?>
      @foreach($historial as $his)
      @if($partidos->idPartido === $his->idPartido)
      @foreach($jugadores as $jug)
      @if($jug->idJugador === $his->idJugador)
      <?php
      $pos = strpos($his->Titular, 'L');
      ?>
      @if($pos === false)
      @if($visita === false)
      <h3>
        @foreach($clubes as $club)
       @if (strcmp($partidos->clubLocalPartido, $club->idClub) === 0)
         {{ $club['nombreClub'] }} {{$partidos->golesLocalPartido}}
        @endif
      @endforeach
      </h3>
      @endif
      <?php
      $visita = true;
      ?>
      <p>{{$jug->nombreJugador}} {{$jug->apellidosJugador}} 
      </p>
      @endif
      @if($pos != false)
      @if($local === false)
      <h3>@foreach($clubes as $club)
        @if($club->idClub === $partidos->clubVisitaPartido)
          {{$club->nombreClub}} {{$partidos->golesVisitaPartido}}
        @endif
      @endforeach</h3>
      @endif
      <?php
      $local = true;
      ?>
      <p>{{$jug->nombreJugador}} {{$jug->apellidosJugador}}
      </p>
      @endif
      @endif
      @endforeach
      @endif
      @endforeach
    </p>
  </div>
  
</body>
</html>