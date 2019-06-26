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
    <h1>{{$dts->nombreDirectorTecnico}} {{$dts->apellidosDirectorTecnico}}</h1>
    <h2>@foreach($clubes as $club)
        @if($club->idClub === $dts->idClub)
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
      Edad:{{$dts->edadDirectorTecnico}}
    </p><p>
        @foreach($paises as $p)
        @if($p->idPais === $dts->idPais)
      Nacionalidad: {{$p->nombrePais}}
      @endif
      @endforeach
    </p>
    </p>
    <p>
        trayectoria:
     @foreach($trayectorias as $t)
     {{$t->nombreClub}}
     @endforeach
    </p>
    <p style="page-break-before: always;">
    Podemos romper la página en cualquier momento...</p>
    </p><p>
    Praesent pharetra enim sit amet...
    </p>
  </div>
</body>
</html>