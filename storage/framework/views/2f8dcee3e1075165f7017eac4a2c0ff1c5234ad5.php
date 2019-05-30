<?php $__env->startSection('titulo', 'Partidos'); ?>


<?php $__env->startSection('content'); ?>

<!---Buscador del Admin --
	<div class="row">
		<div class="col">
			<form class="form-inline my-2 my-lg-0" method="GET" action="/admin" enctype="multipart/form-data">
      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-success my-2 my-sm-0" type="submit">Buscar</button>	
      			
			</form>
		</div>
	</div>	

--- Fin Buscador del Admin --->

<div class="row">



<ul class="nav nav-tabs nav-pills flex-column " id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="arbitro-tab" data-toggle="tab" href="#arbitro" role="tab" aria-controls="arbitro" aria-selected="true">Arbitros</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="asociacion-tab" data-toggle="tab" href="#asociacion" role="tab" aria-controls="asociacion" aria-selected="false">Asociaciones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="ciudad-tab" data-toggle="tab" href="#ciudad" role="tab" aria-controls="ciudad" aria-selected="false">Ciudades</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="club-tab" data-toggle="tab" href="#club" role="tab" aria-controls="club" aria-selected="false">Clubes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="confederacion-tab" data-toggle="tab" href="#confederacion" role="tab" aria-controls="confederacion" aria-selected="false">Confederaciones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="dt-tab" data-toggle="tab" href="#dt" role="tab" aria-controls="dt" aria-selected="false">Dts</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="estadio-tab" data-toggle="tab" href="#estadio" role="tab" aria-controls="estadio" aria-selected="false">Estadios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="federacion-tab" data-toggle="tab" href="#federacion" role="tab" aria-controls="federacion" aria-selected="false">Federaciones</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="jugador-tab" data-toggle="tab" href="#jugador" role="tab" aria-controls="jugador" aria-selected="false">Jugadores</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pais-tab" data-toggle="tab" href="#pais" role="tab" aria-controls="pais" aria-selected="false">Paises</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="torneo-tab" data-toggle="tab" href="#torneo" role="tab" aria-controls="torneo" aria-selected="false">Torneos</a>
  </li>
  <!--<li class="nav-item">
    <a class="nav-link" id="user-tab" data-toggle="tab" href="#user" role="tab" aria-controls="user" aria-selected="false">Users</a>
  </li>-->
  <li class="nav-item">
    <a class="nav-link" id="partidos-tab" data-toggle="tab" href="#partidos" role="tab" aria-controls="partidos" aria-selected="false">Partidos</a>
  </li>
	</ul>


	<div class="col tab-content" id="myTabContent">
  	<div class="tab-pane fade show active" id="arbitro" role="tabpanel" aria-labelledby="arbitro-tab">
  		<div class="row">
  			<div class="col">
  					<a href="/arbitro/create" class="btn btn-success my-2 my-sm-0">Crear Arbitro</a>



				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Tipo</th>
						<th>Nacimiento</th>
						<th>Pais</th>
						<th>Edad</th>
						<th>Grado</th>
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						<?php $__currentLoopData = $arbitros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $arb): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($arb['idArbitro']); ?></td>
								<td><img src="images/arbitro/<?php echo e($arb['imagenArbitro']); ?>" class="img-responsive" style="width:45px !important; height:45px !important"></td>
								<td><?php echo e($arb['nombreArbitro']); ?></td>
								<td><?php echo e($arb['apellidosArbitro']); ?></td>
								<td><?php echo e($arb['tipoArbitro']); ?></td>
								<td><?php echo e($arb['nacimientoArbitro']); ?></td>

								<?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($arb->idPais === $pais->idPais): ?>
										<td><?php echo e($pais['nombrePais']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
								<td><?php echo e($arb['edadArbitro']); ?></td>
								<td><?php echo e($arb['gradoArbitro']); ?></td>

								<td>
									<div class="row"><a href="/arbitro/<?php echo e($arb->idArbitro); ?>/edit" class="btn btn-primary my-2 my-sm-0"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>Editar</a>
									<a href=""> .</a>
									<a href="<?php echo e(route('arbitro.destroy', $arb->idArbitro)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar el árbitro?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a></div>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				

			</div>
		</div>
	</div>
  	
  	<div class="tab-pane fade" id="asociacion" role="tabpanel" aria-labelledby="asociacion-tab">
  		
		
		<div class="row">
			<div class="col">
				<a href="/asociacion/create" class="btn btn-success my-2 my-sm-0"s><span class="glyphicon glyphicon-wrench"></span>Crear Asociación</a>
				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Asociacion</th>
						<th>Fundación</th>
						<th>Imagen</th>
						
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						<?php $__currentLoopData = $asociaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($asoc['idAsociacion']); ?></td>

								<!--<?php $__currentLoopData = $federaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($asoc->idFederacion === $fed->idFederacion): ?>
										<td><?php echo e($fed['nombreFederacion']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->

								<td><?php echo e($asoc['nombreAsociacion']); ?></td>
								<td><?php echo e($asoc['fundacionAsociacion']); ?></td>
								<td><img src="images/asociacion/<?php echo e($asoc['imagenAsociacion']); ?>" class="img-responsive" style="width:60px !important"></td>

								
								<td>
									<a href="/asociacion/<?php echo e($asoc->idAsociacion); ?>/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench"></span>Editar</a>
									<a href="<?php echo e(route('asociacion.destroy', $asoc->idAsociacion)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar la asociación?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				
			</div>
		</div>
  	</div>

  	<div class="tab-pane fade" id="ciudad" role="tabpanel" aria-labelledby="ciudad-tab">
  		
	
		<div class="row">
			<div class="col">
				<a href="/ciudad/create" class="btn btn-success my-2 my-sm-0">Crear Ciudad</a>
				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>ID País</th>
						
						
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						<?php $__currentLoopData = $ciudades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ciu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($ciu['idCiudad']); ?></td>
								<td><?php echo e($ciu['nombreCiudad']); ?></td>

								<?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($ciu->idPais === $pais->idPais): ?>
										<td><?php echo e($pais['nombrePais']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
								


								
								<td>
									<a href="/ciudad/<?php echo e($ciu->idCiudad); ?>/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench"></span>Editar</a>
									<a href="<?php echo e(route('ciudad.destroy', $ciu->idCiudad)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar la ciudad?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				
			</div>
		</div>
  	</div>


	<div class="tab-pane fade" id="club" role="tabpanel" aria-labelledby="club-tab">
		<div class="col">
			<a href="/club/create" class="btn btn-success my-2 my-sm-0">Crear equipo</a>
			<table class="table table-striped">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>País</th>
					<th>Fundación</th>
					<th>Imagen</th>
					
					<th>Acción</th>
					
				</thead>
				<tbody>
					<?php $__currentLoopData = $clubes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><?php echo e($club['idClub']); ?></td>
							<td><?php echo e($club['nombreClub']); ?></td>


							<?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($club->idPais === $pais->idPais): ?>
									<td><?php echo e($pais['nombrePais']); ?></td>		
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


							<td><?php echo e($club->fundacionClub); ?></td>
							<td><img src="images/club/<?php echo e($club['imagenClub']); ?>" class="img-responsive" style="width:45px !important; height:45px !important"></td>
							<td>
								<a href="/club/<?php echo e($club->idClub); ?>/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
								<a href="<?php echo e(route('club.destroy', $club->idClub)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar el club?')" class="btn btn-danger my-2 my-sm-0">Borrar</a>
								</td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<!--<?php $__currentLoopData = $clubes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col-sm">
		-----CARD PRESENTACION CLUB---
					<div class="card" style="width: 15rem;">
			  			<img class="card-img-top" src="imagenes/clubes/<?php echo e($club['imagenClub']); ?>" alt="Card image cap" >
			  			<div class="card-body">
							<h5 class="card-title"><p><?php echo e($club['nombreClub']); ?></p></h5>
				    		<p class="card-text">Fundación: <?php echo e($club['fundacionClub']); ?></p>
				    		<p class="card-text">Correo: <?php echo e($club['correoClub']); ?></p>
				    		<a href="#" class="btn btn-primary">Ver equipo</a>
				  		</div>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>---->
				

		</div>
	</div>
	

	<div class="tab-pane fade" id="confederacion" role="tabpanel" aria-labelledby="confederacion-tab">
	
		<div class="row">
			<div class="col">
				<a href="/confederacion/create" class="btn btn-success my-2 my-sm-0">Crear Confederación</a>

				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>ID Continente</th>
						<th>Nombre</th>
						<th>Fundación</th>
						<th>Acción</th>
						
					</thead>
					<tbody>
						<?php $__currentLoopData = $confederaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($conf['idConfederacion']); ?></td>

								<?php $__currentLoopData = $continentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cont): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($conf->idContinente === $cont->idContinente): ?>
										<td><?php echo e($cont['nombreContinente']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<td><?php echo e($conf['nombreConfederacion']); ?></td>
								<td><?php echo e($conf['fundacionConfederacion']); ?></td>
								
								<td>
									<a href="/confederacion/<?php echo e($conf->idConfederacion); ?>/edit" class="btn btn-info my-2 my-sm-0">Editar<span class="glyphicon glyphicon-wrench"></span></a>
									<a href="<?php echo e(route('confederacion.destroy', $conf->idConfederacion)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar la confederación?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="dt" role="tabpanel" aria-labelledby="dt-tab">
	
		<div class="row">
			<div class="col">
				<a href="/directortecnico/create" class="btn btn-success my-2 my-sm-0">Crear Director Tecnico</a>

				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Nacimiento</th>
						<th>Edad</th>
						<th>Nacionalidad</th>


						
							
						<th>Acción</th>
						
					</thead>
					<tbody>
						<?php $__currentLoopData = $directorestecnicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($dt['idDirectorTecnico']); ?></td>
								<td><?php echo e($dt['nombreDirectorTecnico']); ?></td>
								<td><?php echo e($dt['apellidosDirectorTecnico']); ?></td>
								<td><?php echo e($dt['nacimientoDirectorTecnico']); ?></td>
								<td><?php echo e($dt['edadDirectorTecnico']); ?></td>

								<?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($dt->idPais === $pais->idPais): ?>
										<td><?php echo e($pais['nombrePais']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				


								
								<td>
									<a href="/directortecnico/<?php echo e($dt->idDirectorTecnico); ?>/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
									<a href="<?php echo e(route('directortecnico.destroy', $dt->idDirectorTecnico)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar el DT?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="estadio" role="tabpanel" aria-labelledby="estadio-tab">
	
		<div class="row">
			<div class="col">
				<a href="/estadio/create" class="btn btn-success my-2 my-sm-0">Crear Estadio</a>

				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>ID País</th>
						<th>ID Ciudad</th>
						<th>Inauguración</th>
						<th>Capacidad</th>
						
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						<?php $__currentLoopData = $estadios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($est['idEstadio']); ?></td>
								<td><?php echo e($est['nombreEstadio']); ?></td>

								<?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($est->idPais === $pais->idPais): ?>
										<td><?php echo e($pais['nombrePais']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
								<?php $__currentLoopData = $ciudades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ciu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($est->idCiudad === $ciu->idCiudad): ?>
										<td><?php echo e($ciu['nombreCiudad']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								

								<td><?php echo e($est['inauguracionEstadio']); ?></td>
								<td><?php echo e($est['capacidadEstadio']); ?> personas</td>


								
								<td>
									<a href="/estadio/<?php echo e($est->idEstadio); ?>/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench"></span>Editar</a>
									<a href="<?php echo e(route('estadio.destroy', $est->idEstadio)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar el estadio?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="federacion" role="tabpanel" aria-labelledby="federacion-tab">
	
		<div class="row">
			<div class="col">
				<a href="/federacion/create" class="btn btn-success my-2 my-sm-0">Crear Federación</a>

				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>ID Confederacion</th>
						<th>Nombre</th>
						<th>Fundación</th>
						
						
						<th>Acción</th>
						
					</thead>
					<tbody>
						<?php $__currentLoopData = $federaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($fed['idFederacion']); ?></td>

								<?php $__currentLoopData = $confederaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($fed->idConfederacion === $conf->idConfederacion): ?>
										<td><?php echo e($conf['nombreConfederacion']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
								<td><?php echo e($fed['nombreFederacion']); ?></td>
								<td><?php echo e($fed['fundacionFederacion']); ?></td>
								
								<td>
									<a href="/federacion/<?php echo e($fed->idFederacion); ?>/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
									<a href="<?php echo e(route('federacion.destroy', $fed->idConfederacion)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar la federación?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="jugador" role="tabpanel" aria-labelledby="jugador-tab">
		
		<div class="row">
			<div class="col">
				<a href="/jugador/create" class="btn btn-success my-2 my-sm-0">Crear Jugador</a>

				<table class="table table-striped">
					<thead>
						<th>ID</th>
						
						<th>Nombre</th>
						<th>Apellidos</th>
						<th>Nacimiento</th>
						
						<th>Posición</th>
						<th>Altura</th>
						<th>Peso</th>
						<th>Club</th>
						<!--<th>Goles</th>
						<th>Amarillas</th>
						<th>Rojas</th>
						<th>Minutos</th>-->
						<th>Pais</th>							
						<th>Acción</th>
						
					</thead>
					<tbody>
						<?php $__currentLoopData = $jugadores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($jug['idJugador']); ?></td>
								
								
								<td><?php echo e($jug['nombreJugador']); ?></td>
								<td><?php echo e($jug['apellidosJugador']); ?></td>
								<td><?php echo e($jug['nacimientoJugador']); ?>(<?php echo e($jug['edadJugador']); ?>)</td>
								<td><?php echo e($jug['posicionJugador']); ?></td>
								<td><?php echo e($jug['alturaJugador']); ?></td>
								<td><?php echo e($jug['pesoJugador']); ?></td>
								<?php $__currentLoopData = $clubes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($jug->idClub === $club->idClub): ?>
										<td><?php echo e($club['nombreClub']); ?></td>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
								<!--<td><?php echo e($jug['golesJugador']); ?></td>
								<td><?php echo e($jug['amarillasJugador']); ?></td>
								<td><?php echo e($jug['rojasJugador']); ?></td>
								<td><?php echo e($jug['minutostotalesJugador']); ?></td>-->
								<?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($jug->idPais === $pais->idPais): ?>
										<td><?php echo e($pais['nombrePais']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								
								<td>
									<div class="row">
									<a href="/jugador/<?php echo e($jug->idJugador); ?>/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
								
									<a href="<?php echo e(route('jugador.destroy', $jug->idJugador)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar el jugador?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
									</div>
								<td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="pais" role="tabpanel" aria-labelledby="pais-tab">
		<div class="row">
			<div class="col">
				<a href="/pais/create" class="btn btn-success my-2 my-sm-0">Añadir nuevo País...</a>

					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>Nombre</th>
							<th>Continente</th>
							
							
							<th>Acción</th>
							
						</thead>
						<tbody>
							<?php $__currentLoopData = $paises; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pais): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><?php echo e($pais['idPais']); ?></td>
									<td><?php echo e($pais['nombrePais']); ?></td>

									<?php $__currentLoopData = $continentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cont): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($pais->idContinente === $cont->idContinente): ?>
											<td><?php echo e($cont['nombreContinente']); ?></td>		
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									
	    			
									
									<td>
										<a href="/pais/<?php echo e($pais->idPais); ?>/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
										<a href="<?php echo e(route('pais.destroy', $pais->idPais)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar el país?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>

			
			</div>		
		</div>
	</div>

	<div class="tab-pane fade" id="torneo" role="tabpanel" aria-labelledby="torneo-tab">
	
		<div class="row">
			<div class="col">
				<a href="/torneo/create" class="btn btn-success my-2 my-sm-0">Crear Torneo</a>

				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Nombre</th>
						<th>Edicion</th>
						<th>Organizador</th>
						<th>ID Club Campeon</th>						
						<th>Acción</th>
						
					</thead>
					<tbody>
						<?php $__currentLoopData = $torneos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($tor['idTorneo']); ?></td>
								<td><?php echo e($tor['nombreTorneo']); ?></td>
								<td><?php echo e($tor['edicion']); ?></td>

								<?php $__currentLoopData = $confederaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($tor->idConfederacion === $conf->idConfederacion): ?>
										<td><?php echo e($conf['nombreConfederacion']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php $__currentLoopData = $asociaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $asoc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($tor->idAsociacion === $asoc->idAsociacion): ?>
										<td><?php echo e($asoc['nombreAsociacion']); ?></td>		
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<td>
								<?php $__currentLoopData = $clubes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($tor->idClubCampeon === $club->idClub): ?>
										<?php echo e($club['nombreClub']); ?>	
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
								</td>	

								
								<td>
									<a href="/torneo/<?php echo e($tor->idTorneo); ?>/edit" class="btn btn-info my-2 my-sm-0">Editar<span class="glyphicon glyphicon-wrench"></span></a>
									<a href="<?php echo e(route('torneo.destroy', $tor->idTorneo)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar el Torneo?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>

			</div>
		</div>
	</div>

	<div class="tab-pane fade" id="user" role="tabpanel" aria-labelledby="user-tab">
	
		<div class="row">
			<div class="col">
				<a href="/user/create" class="btn btn-success my-2 my-sm-0">Crear Usuarios</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Tipo</th>				
				<th>Acción</th>				
			</thead>
			<tbody>
				<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($user['id']); ?></td>
						<td><?php echo e($user['name']); ?></td>
						<td><?php echo e($user['email']); ?></td>
						<td><?php echo e($user->tipo); ?></td>
						<td>
							<a href="/user/<?php echo e($user->id); ?>/edit" class="btn btn-info my-2 my-sm-0">Editar</a>			
							<a href="<?php echo e(route('user.destroy', $user->id)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar el usuario?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>	
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>

			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="partidos" role="tabpanel" aria-labelledby="partidos-tab">
	
		<div class="row">
			<div class="col">
				<a href="/partido/create" class="btn btn-success my-2 my-sm-0">Añadir partido</a>
	
	<div class="row">
		<table class="table table-striped">
			<thead>
				<th>ID</th>	
				<th>Equipo Local</th>	
				<th>Equipo Visitante</th>
				<th>Campeonato</th>	
				<th>Acción</th>	
			</thead>
			<tbody>
				<?php $__currentLoopData = $partido; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($parti['idPartido']); ?></td>
						<?php $__currentLoopData = $clubes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($club->idClub === $parti->clubLocalPartido): ?>
								<td><?php echo e($club['nombreClub']); ?></td>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php $__currentLoopData = $clubes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($club->idClub === $parti->clubVisitaPartido): ?>
								<td><?php echo e($club['nombreClub']); ?></td>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php $__currentLoopData = $torneos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($tor->idTorneo === $parti->idTorneo): ?>
								<td><?php echo e($tor['nombreTorneo']); ?></td>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<td>
							<a href="/partido/<?php echo e($parti->idPartido); ?>/edit" class="btn btn-info my-2 my-sm-0"><span class="glyphicon glyphicon-wrench">Editar</span></a>
						</td>
						<td>
							<a href="<?php echo e(route('partido.destroy', $parti->idPartido)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar el partido?')" class="btn btn-danger my-2 my-sm-0">Eliminar</a>
						</td>
					</tr>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tbody>
		</table>
	</div>

			</div>
		</div>
	</div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>