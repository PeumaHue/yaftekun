<form id="equipos" data-toggle="validator" action="<?php echo $accion; ?>" method="POST" enctype="multipart/form-data">
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<i class="fa fa-shield" ></i>                      
					<?php echo $agregar_o_editar; ?>
			</div>
		
			<div class="panel-body">
				<div class="row">
				
					<div class="col-sm-3">
						<div class="row">
	            			<div class="form-group col-sm-12">
	            				<div align="center">
									<div class="thumbnail_fotoescudo">
										<div id="thumbnail_fotoescudo_caption"></div>
								   	    <img id="foto" class="img-thumbnail" src="<?php echo base_url('images/escudos/'. (($this->datos_formulario->imagen=='') ? "no_escudo.png" : $this->datos_formulario->imagen));?>" />
									</div>
									<input type="file" id="imagen" name="imagen" class="filestyle" data-buttonName="btn-primary" data-input="false">
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-sm-9">
						<div class="row">
							<div class="form-group col-md-4 col-sm-4 col-xs-12">
    	 							<?php echo form_dropdown('id_liga', $ligas, ($reset) ? '' : set_value('id_liga',$this->datos_formulario->id_liga), 'class="form-control"'); ?>
	                        </div>
							<div class="form-group col-md-4 col-sm-4 col-xs-12">
                            	<?php echo form_dropdown('id_estadio', $estadios, set_value('id_estadio',$this->datos_formulario->id_estadio), 'class="form-control"'); ?>
		                    </div>
							<div class="form-group col-md-4 col-sm-4 col-xs-12">
        		            	<input type="text" 
									id="nombre" 
									name="nombre"
									value="<?php echo ($reset) ? '' : set_value('nombre',$this->datos_formulario->nombre); ?>"
									class="form-control"
									placeholder="<?php echo lang('form_label_ayuda_nombre_equipo');?>"
									maxlength="100"> 
                		    </div>
							</div>
					</div>
				</div>
		
				<div class="row">
					<div class="col-lg-12" style="text-align: right; padding-top: 20px; padding-bottom: 10px;">
		                <a id="btn_eliminar" href="<?php echo $eliminar; ?>" class="btn boton  boton-azul  btn-ancho120" role="button"><i class="fa fa-trash-o"></i><?php echo lang('form_button_eliminar');?></a>
		                <button id="btn_grabar" type="submit" class="btn boton  boton-azul  btn-ancho120">
		                    <i class="fa fa-save"></i><?php echo lang('form_button_grabar');?>
		                </button>
						<a id="btn_volver" href="<?php echo $volver; ?>" class="btn boton  boton-azul  btn-ancho120" role="button"><i class="fa fa-times"></i><?php echo lang('form_button_volver');?></a>

		            </div>
		    	</div>
            </div>
            
 		</div>
	</div>
	<?php echo form_hidden('id_equipo', $this->datos_formulario->id_equipo); ?>
	<?php echo form_hidden('id_usuario', 1); ?>
	<?php echo form_hidden('imagen_original', $this->datos_formulario->imagen); ?>
</form>