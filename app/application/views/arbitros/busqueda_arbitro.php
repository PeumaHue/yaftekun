

<section id="content">
    
      	
 <form id="participante" data-toggle="validator"
		action="<?php echo $accion; ?>" method="POST">

      	<?php $this->load->view('arbitros/busqueda_hdr_arbitro.php'); ?> 

		<!--//TODO - Investigar para agregar los botones de guadar y eliminar etc  -->
		<!-- BOTON DE ALTA 
		<button class="btn btn-float btn-danger m-btn">
			<i class="zmdi zmdi-plus"
				onclick="$('#pnl_listado_jugadores').hide();"></i>
		</button>
		-->
		
		<!-- BARRA BOTONES
		<div class="action-header palette-Teal-400 bg clearfix m-b-0">
			<div class="ah-label hidden-xs palette-White text">Listado de
				jugadores</div>

			<div class="ah-search">
				<input type="text" placeholder="Que jugador quiere buscar?"
					class="ahs-input"> <i
					class="ah-search-close zmdi zmdi-long-arrow-left"
					data-ma-action="ah-search-close"></i>
			</div>

			<ul class="ah-actions actions a-alt">
				<li><a href="" class="ah-search-trigger"
					data-ma-action="ah-search-open"> <i class="zmdi zmdi-search"></i>
				</a></li>

				<li><a href=""> <i class="zmdi zmdi-time"></i>
				</a></li>
				<li class="dropdown"><a href="" data-toggle="dropdown"
					aria-expanded="true"> <i class="zmdi zmdi-sort"></i>
				</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="">Last Modified</a></li>
						<li><a href="">Last Edited</a></li>
						<li><a href="">Name</a></li>
						<li><a href="">Date</a></li>
					</ul></li>
				<li><a href=""> <i class="zmdi zmdi-info"></i>
				</a></li>
				<li class="dropdown"><a href="" data-toggle="dropdown"
					aria-expanded="true"> <i class="zmdi zmdi-more-vert"></i>
				</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="">Refresh</a></li>
						<li><a href="">Listview Settings</a></li>
					</ul></li>
			</ul>
		</div>-->
		<!-- FIN BARRA BOTONES-->
		<div class="card m-b-0">

			<!-- PANEL DE NOMBRES DE JUGADORES -->
			<div id="pnl_listado_jugadores">
				<div class="list-group lg-alt">
					<div class="col-sm-6 col-md-4 col-xs-12">
						<a href="" class="list-group-item media ">
							<div class="pull-left">
								<img class="avatar-img" src="img/jugadores/no-foto.png" alt="">
							</div>

							<div class="media-body m-t-10">David Villa Jacobs</div>
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-xs-12">
						<a href="" class="list-group-item media ">
							<div class="pull-left">
								<img class="avatar-img " src="img/jugadores/no-foto.png" alt="">
							</div>

							<div class="media-body m-t-10">Sergio Raimundo</div>
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-xs-12">
						<a href="" class="list-group-item media ">
							<div class="pull-left">
								<img class="avatar-img " src="img/jugadores/no-foto.png" alt="">
							</div>

							<div class="media-body m-t-10">Darla Mckinney</div>
						</a>
					</div>
					<div class="col-sm-6  col-md-4 col-xs-12">
						<a href="" class="list-group-item media">
							<div class="pull-left">
								<img class="avatar-img " src="img/jugadores/no-foto.png" alt="">
							</div>
							<div class="media-body m-t-10">Darla Mckinney</div>
						</a>
					</div>
					<div class="col-sm-6 col-md-4 col-xs-12">
						<a href="" class="list-group-item media">
							<div class="pull-left">
								<img class="avatar-img " src="img/jugadores/no-foto.png" alt="">
							</div>
							<div class="media-body m-t-10">Rudolph Perez</div>
						</a>
					</div>
					<br />
					<div class="clearfix"></div>
					<div class="load-more ">
						<a href=""><i class="zmdi zmdi-refresh-alt"></i>Refrescar...</a>
					</div>
				</div>

			</div>
			<!-- FIN PANEL DE NOMBRE DE JUGADORES -->
		</div>
	</form>
</section>
