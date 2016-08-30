
<section id="content">
	<div class="container">
		<div class="card m-t-5">
			<div class="card-header" style="height: 200px; padding-top: 80px">
				<!--<div style="margin-top:50px">-->
				<div class="pull-left m-r-10">
					<img class="media-object" src="<?php echo base_url('img_users/logotorneo.png');?>" width="34" height="42" alt="">
				</div>
				<h1 class="m-t-0">TORNEO SENIOR OFICIAL</h1>
					<ul class="actions">
					<li class="dropdown"><a href="" data-toggle="dropdown"> <i
							class="zmdi zmdi-more-vert"></i>
						</a>
	
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="">Cambiar liga</a></li>  <!-- //TODO: Agregar submenu que muestra los torneos "vigentes" para seleccionar uno  -->
								<li><a href="">Nueva liga</a></li>
							</ul>
					</li>
				</ul>
				<!--</div>-->
			</div>

			<!--                     <div class="card-body">
                        <div class="chart-edge">
                            <div id="curved-line-chart" class="flot-chart "></div>
                        </div>
                    </div> -->
		</div>
		<div class="row p-t-20">
			<div class="col-md-4 col-sm-6 ">
				<div class="card c-dark palette-Blue bg z-depth-1 ">
					<a href="<?php echo site_url('torneo'); ?>" class="palette-Light-Blue-900 text ">
						<div class="ca-item media">
							<div class="pull-left hidden-sm  ">
								<i class="zmdi zmdi-globe-alt zmdi-hc-fw f-80 "></i>
							</div>
							<div class="pull-right media-body text-right m-10">
								<h2><?php echo $tablero_totales->total_torneo;?></h2>
								<small><?php echo lang('form_label_torneos');?></small>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="card c-dark palette-Green-A700 bg z-depth-1">
					<a href="<?php echo site_url('equipo'); ?>" class="palette-Green-800 text">
						<div class="ca-item media">
							<div class="pull-left hidden-sm ">
								<i class="zmdi zmdi-shield-security zmdi-hc-fw f-80"></i>
							</div>
							<div class="pull-right media-body text-right m-10">
								<h2><?php echo $tablero_totales->total_equipo;?></h2>
								<small><?php echo lang('form_label_equipos');?></small>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="card c-dark palette-Blue-Grey bg z-depth-1">
					<a href="" class="palette-Blue-Grey-800 text">
						<div class="ca-item media">
							<div class="pull-left hidden-sm ">
								<i class="zmdi zmdi-account zmdi-hc-fw f-80"></i>
							</div>
							<div class="pull-right media-body text-right m-10">
								<h2><?php echo $tablero_totales->total_jugador;?></h2>
								<small><?php echo lang('form_label_jugadores');?></small>
							</div>
						</div>
					</a>
				</div>
			</div>

		</div>
		<div class="row p-t-20">

			<div class="col-md-4 col-sm-6">
				<div class="card c-dark palette-Light-Green bg  z-depth-1">
					<a href="<?php echo site_url('director_tecnico'); ?>" class="palette-Light-Green-800 text">
						<div class="ca-item media">
							<div class="pull-left hidden-sm ">
								<i class="zmdi zmdi-assignment-o zmdi-hc-fw f-80"></i>
							</div>
							<div class="pull-right media-body text-right m-10">
								<h2><?php echo $tablero_totales->total_dt;?></h2>
								<small><?php echo lang('form_label_directores_tecnicos');?></small>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6">
				<div class="card c-dark palette-Red bg z-depth-1">
					<a href="<?php echo site_url('arbitro'); ?>" class="palette-Red-800 text">
						<div class="ca-item media">
							<div class="pull-left hidden-sm ">
								<i class="zmdi zmdi-font zmdi-hc-fw f-80"></i>
							</div>
							<div class="pull-right media-body text-right m-10">
								<h2><?php echo $tablero_totales->total_arbitros;?></h2>
								<small><?php echo lang('form_label_arbitros');?></small>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-sm-6 ">
				<div class="card c-dark palette-Brown-400 bg z-depth-1">
					<a href="<?php echo site_url('delegado'); ?>" class="palette-Brown-800 text">
						<div class="ca-item media">
							<div class="pull-left hidden-sm ">
								<i class="zmdi zmdi-flag zmdi-hc-fw f-80"></i>
							</div>
							<div class="pull-right media-body text-right m-10">
								<h2><?php echo $tablero_totales->total_delegados;?></h2>
								<small><?php echo lang('form_label_delegados');?></small>
							</div>
						</div>
					</a>
				</div>
			</div>

		</div>
	</div>
</section>