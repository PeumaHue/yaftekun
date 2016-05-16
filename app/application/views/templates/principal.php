<form id=<?php echo $form_id; ?> data-toggle="validator" action="none" method="POST">
	<div class="container ">
		<div class="<?php echo $titulo_formato_panel; ?>">
			<div class="panel-heading ">
				<h1 class="input-group"><?php echo lang($titulo_label);?></h1>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo lang($grilla_ppal_label);?>
				<div class="pull-right">
					<div class="btn-group">
						<button class="btn btn-default btn-xs dropdown-toggle "
							type="button" data-toggle="collapse" data-target="#principal_body"
							aria-expanded="true">
							<i id="flecha_principal" class="fa fa-chevron-up"></i>
						</button>
					</div>
				</div>
			</div>
			<div class="panel-body collapse in" id="principal_body"
				aria-expanded="true">

				<?php echo $datos_ppal; ?>
			</div>
		</div>
	</div>
</form>