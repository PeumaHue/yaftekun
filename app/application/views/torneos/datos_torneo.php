<form id="torneo" data-toggle="validator" action="<?php echo $accion; ?>" method="POST">
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<i class="glyphicon glyphicon-user ico-panel" ></i><?php echo $agregar_o_editar; ?>
			</div>
	 		<div class="panel-body">
    			<div clas="row">
    				<div class="form-group col-sm-6">
		           		<input type="text" id="txt_NombreTorneo" value="<?php echo ($reset) ? '' : set_value('nombre',$this->datos_formulario->nombre); ?>" class="form-control" name="nombre" placeholder="<?php echo lang('form_label_nombre');?>" maxlength="200">
		        	</div>
		 	        <div class="form-group col-sm-3">
		    	        <input type="text" id="txt_CantidadEquipos" value="<?php echo ($reset) ? '' : set_value('cantidad_equipos',$this->datos_formulario->cantidad_equipos); ?>" class="form-control" name="cantidad_equipos" placeholder="<?php echo lang('form_label_cantidad_equipos');?>" onkeypress="return validarNumeroControl(event)" maxlength="4">
		        	</div>
		        	<div class="form-group col-sm-3">
		            	<?php echo form_dropdown('id_tipo_modalidad', $modalidades, set_value('id_tipo_modalidad',$this->datos_formulario->id_tipo_modalidad), 'class="form-control"'); ?>
		            </div>
		        </div>
		        <div class="row"></div>
		        <div class="row">
						<div class="col-lg-12" style="text-align: right; padding-top: 20px; padding-bottom: 10px;">
							<a id="btn_eliminar" href="<?php echo $eliminar; ?>" class="btn boton  boton-azul  btn-ancho120" role="button"><i class="fa fa-trash-o"></i><?php echo lang('form_button_eliminar');?></a>
					 		<button id="btn_grabar" type="submit" class="btn boton  boton-azul  btn-ancho120"><i class="fa fa-save"></i><?php echo lang('form_button_grabar');?></button>
		                	<a id="btn_volver" href="<?php echo $volver; ?>" class="btn boton  boton-azul  btn-ancho120" role="button"><i class="fa fa-times"></i><?php echo lang('form_button_volver');?></a>
		 	       		</div>
			    </div>
			</div>
		</div>   				
   	</div>
<?php echo form_hidden('id_torneo', $this->datos_formulario->id_torneo); ?>
</form>    
    
    