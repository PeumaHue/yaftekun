<form id="datosequipo" data-toggle="validator" action="none" method="POST">
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">
				<?php echo lang('html_equipos_titulo_datos');?>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<div class="input-group col-xs-12">
						<!-- placeholder="<?php echo lang('form_label_ayuda_nombre_equipo');?>"-->
						<input type="text" id="txt_IdLiga" name="liga"
							class="form-control"
							placeholder="Ingrese el id de la liga para el equipo" 
							maxlength="100"> 
		
						<input type="text" id="txt_IdEstadio" name="estadio"
							class="form-control"
							placeholder="Ingrese el id del estadio para el equipo" 
							maxlength="100"> 
						
						<input type="text" id="txt_IdUduario" name="usuario"
							class="form-control"
							placeholder="Ingrese su id de usuario" 
							maxlength="100"> 
						
						<input type="text" id="txt_Nombre" name="nombre"
							class="form-control"
							placeholder="<?php echo lang('form_label_ayuda_nombre_equipo');?>"
							maxlength="100"> 
						
						<div class="form-group">
							<label><?php echo lang('form_label_equipo_imagen');?></label> 
							<input type="file">
						</div>			
							
					</div>
				</div>
				<!-- 
				<div class="form-group">
					<label><?php echo lang('form_label_equipo_imagen');?></label> <input
						type="file">
				</div>
				 -->
		
			</div>
			
			<div class="panel-error">
				Apartado para mostrar errores
				<?php echo lang('form_label_equipos');?>
			</div>
		</div>
	</div>

	<div class="container">

		<div class="col-lg-12"
			style="text-align: right; padding-top: 30px; padding-bottom: 10px;">

			<button class="btn boton  boton-azul  btn-ancho120">
				<i class="fa fa-save"></i><?php echo lang('form_button_grabar');?>
			</button>
			<button class="btn boton  boton-azul  btn-ancho120">
				<i class="fa fa-trash-o"></i><?php echo lang('form_button_eliminar');?>
			</button>
			<button class="btn boton  boton-azul  btn-ancho120">
				<i class="fa fa-times"></i><?php echo lang('form_button_cancelar');?>
			</button>
		</div>
	</div>
</form>