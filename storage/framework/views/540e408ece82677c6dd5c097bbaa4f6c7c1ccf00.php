<?php $__env->startSection('titulo', 'Partidos'); ?>

<?php $__env->startSection('content'); ?>


<div class="row  justify-content-center">
	
	<div class="col">
		<?php $__currentLoopData = $torneos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
		<div class="border">
			<?php if($tor->idConfederacion === NULL): ?>
				<h3 class=""><?php echo e($tor['nombreTorneo']); ?></h3><!-- Muestra los torneos que hay -->
				<?php $__currentLoopData = $partidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

					<?php if($part->idTorneo === $tor->idTorneo): ?>
					<div class="border">
						<div class="row justify-content-center" >
							<div class="col-4 " align="right">	
								<?php $__currentLoopData = $clubes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>									
									<?php if($part->clubLocalPartido === $club->idClub): ?>
									
										<a href="<?php echo e(route('club.show', $club->idClub)); ?>" class="text-dark"><span><?php echo e($club['nombreClub']); ?></span>
										<img src="<?php echo e(asset('images/club/' .$club->imagenClub)); ?>" class="img-responsive" style="width:21px !important; height:21px !important"></a>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							<div class="col-1 " align="center">
								<?php if($part->estadoPartido === 'Proximo'): ?>
									<a href="<?php echo e(route('partido.show', $part->idPartido)); ?>" class="text-dark"><span> <?php echo e($part['horaPartido']); ?></span></a>
								<?php endif; ?>
								<?php if($part->estadoPartido === 'Suspendido'): ?>
									<a href="<?php echo e(route('partido.show', $part->idPartido)); ?>" class="text-dark"><span> <?php echo e($part['estadoPartido']); ?></span></a>	
								<?php endif; ?>				
								<?php if($part->estadoPartido === 'En curso'): ?>
									<a href="<?php echo e(route('partido.show', $part->idPartido)); ?>" class="text-dark"><span><?php echo e($part['golesLocalPartido']); ?> - <?php echo e($part['golesVisitaPartido']); ?></span></a>
								<?php endif; ?>
								<?php if($part->estadoPartido === 'Expirado'): ?>
									<a href="<?php echo e(route('partido.show', $part->idPartido)); ?>" class="text-dark"><span><?php echo e($part['golesLocalPartido']); ?> - <?php echo e($part['golesVisitaPartido']); ?></span></a>
								<?php endif; ?>
							</div>
							<div class="col-4 " align="left">	
								<?php $__currentLoopData = $clubes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>									
									<?php if($part->clubVisitaPartido === $club->idClub): ?>
										<a href="<?php echo e(route('club.show', $club->idClub)); ?>" class="text-dark"><img src="<?php echo e(asset('images/club/' .$club->imagenClub)); ?>" class="img-responsive" style="width:21px !important; height:21px !important">
										<span><?php echo e($club['nombreClub']); ?></span></a>

									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			
							</div>
						</div>	
						</div>				
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>	
			</div>
		<p></p>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
	</div>


	<!--------------------BUSCADOR POR FECHA-----------------------------
	
			<div class="col-2">
				<label for="">Fecha</label>
					<input type="date" name="fecha" class="form-control">
					<a href="">Ver partidos</a>

			</div>
			------------->
	
</div>

<div>
	<div class="row justify-content-center">
		<h2> Torneos Internacionales </h2>
	</div>

	<div class="container" style="height:500px"> 
		<ul class="" role="" style="width: 1200px;"> 
			<li class="" role="" aria-hidden="" style="width: 1200px; height: 500px; margin-right: 0px;"> 
				<a href="torneo" class="internacional"> 
					<img class="lazy-load" width="1000" height="340" alt="UEFA" src="images/torneos/championsleague.jpg"> 
				</a> 
			</li>
		</ul>
	</div>
</div>
	

























































<!--------------------------------------------------------------------------------------------------------
	<a href="/partido/create" class="btn btn-default">Crear Partido</a>
		<div class="row">
			<table class="table table-striped">

				<?php $__currentLoopData = $torneos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
						<thead>
							<th><span><?php echo e($tor['nombreTorneo']); ?></span></th>
							<th><a href="<?php echo e(route('torneo.index', $tor->idTorneo)); ?>"> >></a></th>
						</thead>
					
				<tbody>
					<tr>
						<td>
							<?php $__currentLoopData = $partidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php $__currentLoopData = $clubes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($tor->idTorneo === $part->idTorneo): ?>
										<?php if((strcmp($club->idClub, $part->clubLocalPartido) === 0)): ?>
										
										
											<div class="col">
										 		<a href="<?php echo e(route('club.index', $club->idClub)); ?>" class="card-link" data-toggle="collapse show" data-parent="#acordion"><?php echo e($club->nombreClub); ?></a>
										<?php endif; ?>
										<?php if($part->clubVisitaPartido === $club->idClub): ?>
												<a href="<?php echo e(route('partido.show', $part->idPartido)); ?>" class="btn btn-default text-dark"><h><?php echo e($part->golesLocalPartido); ?> - </h><h><?php echo e($part->golesVisitaPartido); ?></h></a>

										 	<a href="<?php echo e(route('club.index', $club->idClub)); ?>" class="card-link" data-toggle="collapse show" data-parent="#acordion" title="<?php echo e($part->clubVisitaPartido); ?><?php echo e($club->nombreClub); ?>"><?php echo e($club->nombreClub); ?></a>	
										 	</div>
										<?php endif; ?>
										
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					
							
						</td>
						<td>
							<a href="/partido/<?php echo e($part->idPartido); ?>/edit" class="btn btn-warning"><span class="glyphicon glyphicon-wrench">Editar</span></a>
							<a href="<?php echo e(route('partido.destroy', $part->idPartido)); ?>" onclick="return confirm('¿Estás seguro que deseas eliminar el partido?')" class="btn btn-danger">Eliminar</a>
						</td>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tr>
				</tbody>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</table>
		</div>
--->

<!------------------------------------------------------------>


<!--

	<div class="row">
		<div class="col align-self-center">
			<ul class="list-group">
				<?php $__currentLoopData = $partidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php if($clubes===1): ?>
					<a href=""></a>




					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




















					<?php $__currentLoopData = $partidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php $__currentLoopData = $clubes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($part->clubLocalPartido === $club->idClub): ?> 

								<div id="acordion"> 
									<div class="card-header">
										<div class="col">
									 	<a href="<?php echo e(route('club.index', $club->idClub)); ?>" class="card-link" data-toggle="collapse show" data-parent="#acordion"><?php echo e($club->nombreClub); ?></a>
									<a href="/partido/create" class="btn btn-default text-dark">
										<h><?php echo e($part->golesLocalPartido); ?> -</h>	
							
							
																<h><?php echo e($part->golesVisitaPartido); ?></h>
									</a>
									 	<a href="<?php echo e(route('club.index', $club->idClub)); ?>" class="card-link" data-toggle="collapse show" data-parent="#acordion"><?php echo e($part->clubVisitaPartido); ?></a>	


									 	</div>
									 	
									</div>
								</div>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
				</ul>
			</ul>
		</div>		
	</div>
-->


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>