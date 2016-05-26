		<div class="form-group col-sm-6">
			<label class="control-label">ID DE LA LIGA</label>
			<input type="text" 
				id="id_liga" 
				name="id_liga"
				value="<?php echo set_value('id_liga',$this->datos_formulario->id_liga); ?>"
				class="form-control"
				placeholder="Ingrese el id de la liga para el equipo" 
				maxlength="100"> 
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label">ID DEL ESTADIO</label>
			<input type="text" 
				id="id_estadio" 
				name="id_estadio"
				value="<?php echo set_value('id_estadio',$this->datos_formulario->id_estadio); ?>"
				class="form-control"
				placeholder="Ingrese el id del estadio para el equipo" 
				maxlength="100"> 
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label">ID DEL USUARIO</label>
			<input type="text" 
				id="id_usuario" 
				name="id_usuario"
				value="<?php echo set_value('id_usuario',$this->datos_formulario->id_usuario); ?>"
				class="form-control"
				placeholder="Ingrese su id de usuario" 
				maxlength="100"> 
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label">NOMBRE DEL EQUIPO</label>				
			<input type="text" 
				id="nombre" 
				name="nombre"
				value="<?php echo set_value('nombre',$this->datos_formulario->nombre); ?>"
				class="form-control"
				placeholder="<?php echo lang('form_label_ayuda_nombre_equipo');?>"
				maxlength="100"> 
		</div>
		<div class="form-group col-sm-6">
			<div class="form-group">
				<label><?php echo lang('form_label_equipo_imagen');?></label> 
				<input type="file" name="imagen" value="<?php echo set_value('imagen',$this->datos_formulario->imagen); ?>">
			</div>			
		</div>				
					
				
	
		<div class="panel-error">
			<?php echo $mensaje; ?>
		</div>

			<div class="col-lg-12" style="text-align: right; padding-top: 30px; padding-bottom: 10px;">

                <button type="submit" class="btn boton  boton-azul  btn-ancho120">
                    <i class="fa fa-save"></i><?php echo lang('form_button_grabar');?>
                </button>

                <a href="<?php echo $eliminar; ?>" class="btn boton  boton-azul  btn-ancho120" role="button">
                    <i class="fa fa-trash-o"></i><?php echo lang('form_button_eliminar');?>
                </a>

                <a href="<?php echo $cancelar; ?>" class="btn boton  boton-azul  btn-ancho120" role="button">
                    <i class="fa fa-times"></i><?php echo lang('form_button_cancelar');?>
                </a>
            </div>
 		
	</div>
</form>