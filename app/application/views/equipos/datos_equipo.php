		<div class="form-group col-sm-6">
           	<label class="control-label"><?php echo lang('form_label_liga');?></label>
			<?php echo form_dropdown('id_liga', $ligas, set_value('id_liga',$this->datos_formulario->id_liga), 'class="form-control"'); ?>
		</div>
		<div class="form-group col-sm-6">
            <label class="control-label"><?php echo lang('form_label_estadio');?></label>
			<?php echo form_dropdown('id_estadio', $estadios, set_value('id_estadio',$this->datos_formulario->id_estadio), 'class="form-control"'); ?>
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label"><?php echo lang('form_label_nombre');?></label>				
			<input type="text" 
				id="nombre" 
				name="nombre"
				value="<?php echo ($reset) ? '' : set_value('nombre',$this->datos_formulario->nombre); ?>"
				class="form-control"
				placeholder="<?php echo lang('form_label_ayuda_nombre_equipo');?>"
				maxlength="100"> 
		</div>
		<div class="form-group col-sm-6">
			<div class="form-group">
				<label><?php echo lang('form_label_equipo_imagen');?></label> 
				<input type="file" name="imagen" value="<?php echo set_value('imagen',$this->datos_formulario->imagen); ?>">
				<?php echo set_value('imagen_original',$this->datos_formulario->imagen_original); ?>
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
	<?php echo form_hidden('id_equipo', $this->datos_formulario->id_equipo); ?>
	<?php echo form_hidden('id_usuario', 1); ?>
	<?php echo form_hidden('imagen_original', $this->datos_formulario->imagen); ?>
</form>