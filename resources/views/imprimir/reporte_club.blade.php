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
                coas
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
      <p> Contacto: {{ $clubes['correoClub'] }} // {{ $clubes['telefonoClub'] }} </p>
    </p>
    <p>
      Arqueros:
      @foreach($jugadores as $jug)
      @if($jug->idClub === $clubes->idClub)
      @if($jug->posicionJugador === 'Arquero')
      {{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}
      @endif
      @endif
      @endforeach
    </p>
    <p>
      Defensas:
      @foreach($jugadores as $jug)
      @if($jug->idClub === $clubes->idClub)
      @if($jug->posicionJugador === 'Defensa')
      {{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}
      @endif
      @endif
      @endforeach
    </p>
    <p>
      Mediocampistas:
      @foreach($jugadores as $jug)
      @if($jug->idClub === $clubes->idClub)
      @if($jug->posicionJugador === 'Mediocampista')
      {{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}
      @endif
      @endif
      @endforeach
    </p>
      Delanteros:
      @foreach($jugadores as $jug)
      @if($jug->idClub === $clubes->idClub)
      @if($jug->posicionJugador === 'Delantero')
      {{ $jug['nombreJugador'] }} {{ $jug['apellidosJugador'] }}
      @endif
      @endif
      @endforeach
    </p>
  </div>
</body>
</html>