<form id="dt" data-toggle="validator" action="none" method="POST">
	<nav class="navbar navbar-inverse">
		<div class="container-fluid panel-directores">
			<div class="navbar-collapse titulo_gupo" id="myNavbar">
				<h2 class="input-group"><?php echo lang('html_director_tecnico_titulo_default');?></h2>

			</div>
		</div>
	</nav>

	<div class="container ">

		<div class="alert alert-danger">Apartado para mostrar errores usar
			class = alert-danger ok usar class = alert-success</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row show-grid ">
					<div class="col-xs-12 col-sm-4 pt-8">
						<i class="fa fa-bullhorn ico-panel"></i><?php echo lang('html_director_tecnico_titulo_default');?></div>
					<div class="col-xs-8 col-sm-5">
						<div class="input-group">
							<input type="text" id="txt_busqueda" name="busqueda"
								class="form-control" placeholder="Búsqueda" maxlength="100"> <span
								class="input-group-btn">
								<button class="btn btn-default" type="button">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>

					</div>
					<div class="col-xs-1">
						<a href="#>" role="button" class="btn btn-primary btn-circle"> <i
							class="fa fa-plus"></i>
						</a>
					</div>
					<div class="col-xs-3 col-sm-2">
						<div class="pull-right">
							<div class="btn-group">
								<button class="btn btn-default btn-xs dropdown-toggle "
									type="button" data-toggle="collapse" data-target="#dt_body">
									<i id="flecha_dt" class="fa fa-chevron-up"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel-body collapse in" id="dt_body"
				aria-expanded="true">


				<ul class="list-inline small interlineado-X1">
					<li class="col-xs-12 col-sm-3"><a href="#" class="btn btn-link">RAIMUNDO
							SERGIO DANIEL</a></li>
					<li class="col-xs-12 col-sm-3"><a href="#" class="btn btn-link">CUPO
							MARCO</a></li>
					<li class="col-xs-12 col-sm-3"><a href="#" class="btn btn-link">ANDOLFATO
							MARIANO</a></li>
					<li class="col-xs-12 col-sm-3"><a href="#" class="btn btn-link">KOZLOWSKI
							CARLOS</a></li>
					<li class="col-xs-12 col-sm-3"><a href="#" class="btn btn-link">ANDRADE
							GASTON</a></li>
				</ul>
			</div>
		</div>