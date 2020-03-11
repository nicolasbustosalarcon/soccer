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
      height: 100px;
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
    <h1>
      {{ $clubes['nombreClub'] }}
    </h1>
    <h3></h3>
    <h2></h2>
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
    <p> Fundación: {{ $clubes['fundacionClub'] }}</p>
    <p> Sede: {{ $clubes['sedeClub'] }},
      @foreach($ciudades as $ciu)
      @if($clubes->idCiudad === $ciu->idCiudad)
      {{ $ciu['nombreCiudad'] }},
      @endif
      @endforeach
      @foreach($paises as $pais)
      @if($clubes->idPais === $pais->idPais)
      {{ $pais['nombrePais'] }}
      @endif
      @endforeach
      
    <p>
      <h2>Plantel</h2>
      <h3>Arqueros:</h3>
      @foreach($jugadores as $jug)
      @if($jug->idClub === $clubes->idClub)
      @if($jug->posicionJugador === 'Arquero')
      <p>
        {{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}
      </p>
      @endif
      @endif
      @endforeach
    </p>
    <p>
      <h3>Defensas:</h3>
      @foreach($jugadores as $jug)
      @if($jug->idClub === $clubes->idClub)
      @if($jug->posicionJugador === 'Defensa')
      <p>{{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}</p>
      @endif
      @endif
      @endforeach
    </p>
    <p>
      <h3>Mediocampistas:</h3>
      @foreach($jugadores as $jug)
      @if($jug->idClub === $clubes->idClub)
      @if($jug->posicionJugador === 'Mediocampista')
     <p> 
      {{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}
      </p>
      @endif
      @endif
      @endforeach
    </p>
     <h3>Delanteros:</h3> 
      @foreach($jugadores as $jug)
      @if($jug->idClub === $clubes->idClub)
      @if($jug->posicionJugador === 'Delantero')
     <p> 
      {{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}
      </p>
      @endif
      @endif
      @endforeach
    </p>
  </div>
</body>
</html>