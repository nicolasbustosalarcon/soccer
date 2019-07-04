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
    <h1>{{$jugador->nombreJugador}} {{$jugador->apellidosJugador}}</h1>
    <h2>@foreach($clubes as $club)
        @if($club->idClub === $jugador->idClub)
            {{$club->nombreClub}}
        @endif
        @endforeach</h2>
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
    <p>
      Edad:{{$jugador->edadJugador}}
    </p><p>
        @foreach($paises as $p)
        @if($p->idPais === $jugador->idPais)
      Nacionalidad: {{$p->nombrePais}}
      @endif
      @endforeach
    </p>
    <p>
        trayectoria:
     @foreach($Trayectorias as $t)
     {{$t->nombreClub}}
     @endforeach
    </p>
    <p>
      Posición:{{$jugador->posicionJugador}}
    </p>
    <p>
      Altura:{{$jugador->alturaJugador}}mts
    </p>
    <p>
      Peso:{{$jugador->pesoJugador}}kg
    </p>
  </div>
</body>
</html>