<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading"> 
	<i class="glyphicon glyphicon-user ico-panel" ></i>                      
    <?php echo $agregar_o_editar; ?>
  </div>
 		    <div class="panel-body">
 		    <div class="form-group col-sm-3">
 		    	<div class="row">
            		<div class="form-group col-sm-12">
    					<div class="thumbnail_fotoparticipante"> 
							<div id="thumbnail_fotoparticipante_caption"></div>
						</div>
						
						<input id="fileUpload" multiple="multiple" type="file" class="btn btn-primary"/>
					</div>
                </div>
 		    </div>
 		    <div class="form-group col-sm-9">
		    	<div class="row">
					<div class="form-group col-sm-6">
    					<input type="text" id="txt_Apellido" value="<?php echo ($reset) ? '' : set_value('apellido',$this->datos_formulario->apellido); ?>" name="apellido" class="form-control"  maxlength="100" placeholder="<?php echo lang('form_label_apellido');?>">
    				</div>
    				<div class="form-group col-sm-6">
       					<input type="text" id="txt_Nombre" value="<?php echo ($reset) ? '' : set_value('nombre',$this->datos_formulario->nombre); ?>" name="nombre" class="form-control"  maxlength="100" placeholder="<?php echo lang('form_label_nombre');?>">
    				</div>
				</div>
	   			<div class="row">
                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
    	 	<?php echo form_dropdown('id_tipo_documento', $documentos, $documento, 'class="form-control"'); ?>
                            
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
                            <input type="text" id="txt_NroDoc" value="<?php echo ($reset) ? '' : set_value('nro_doc',$this->datos_formulario->nro_doc); ?>" class="form-control" name="numero_documento"  maxlength="8" placeholder="<?php echo lang('form_label_numero_documento');?>">
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
                            <input id="txt_FechaNacimiento" value="<?php echo ($reset) ? '' : set_value('fecha_nacimiento',$this->datos_formulario->fecha_nacimiento); ?>" class="form-control" name="fecha_nacimiento"  maxlength="10" placeholder="<?php echo lang('form_label_fecha_nacimiento');?>">
                        </div>
                </div>
	   			<div class="row">
                         <div class="form-group col-md-4 col-sm-4 col-xs-12">
                            <input id="txt_Nacionalidad" value="<?php echo ($reset) ? '' : set_value('nacionalidad',$this->datos_formulario->nacionalidad); ?>" class="form-control" name="nacionalidad"  maxlength="10" placeholder="<?php echo lang('form_label_nacionalidad');?>">
                        </div>
                        <div class="form-group col-md-4 col-sm-4 col-xs-12">
                           <?php echo form_dropdown('id_tipo_estado_civil', $estados_civiles, $estado_civil, 'class="form-control"'); ?>
                        </div>
                        <div class="form-group col-md-4 col-sm-8 col-xs-12">
                            <input type="text" id="txt_Conyugue" value="<?php echo ($reset) ? '' : set_value('conyuge_nombre',$this->datos_formulario->conyuge_nombre); ?>" name="conyugue" class="form-control"  maxlength="50" placeholder="<?php echo lang('form_label_nombre_conyuge');?>">
                        </div>
</div>
       			<div class="row">
       			  <div class="form-group col-sm-12">
  					    <div class="panel panel-default">
  							<div class="panel-heading" id="ficha_medica">
					            <i class="glyphicon glyphicon-heart-empty ico-panel"></i>
					                <?php echo lang('form_label_ficha_medica');?>
					                    <div class="pull-right">
	                        				<div class="btn-group">
					                            <button class="btn btn-default btn-xs dropdown-toggle " type="button" data-toggle="collapse" data-target="#ficha_medica_body">
					                                <i id="flecha_ficha_medica" class="fa fa-chevron-down"></i>
					                            </button>
	                        				</div>
	                    				</div>
	                		</div>
				            <div class="panel-body collapse" id="ficha_medica_body">
				                 <div class="row">
				                        <div class="form-group col-sm-6">
						                    <input type="text" id="txt_CoberturaMedica" value="<?php echo ($reset) ? '' : set_value('cobertura_medica',$this->datos_formulario->cobertura_medica); ?>" name="cobertura_medica" class="form-control"  maxlength="50" placeholder="<?php echo lang('form_label_cobertura_medica');?>">
        		                        </div>
				                        <div class="form-group  col-sm-6">
				                            <input type="text" id="txt_Fecha_apto_medico" value="<?php echo ($reset) ? '' : set_value('fecha_apto_medico',$this->datos_formulario->conyuge_nombre); ?>" name="fecha_apto_medico" class="form-control"  maxlength="50" placeholder="<?php echo lang('form_label_fecha_apto_medico');?>">
    				                    </div>
				                 </div>
				                 <div class="row">
				                 		<div class="form-group col-sm-12">
											<div class="fileinput fileinput-new" data-provides="fileinput">
  												<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
    												<img data-src="holder.js/100%x100%" alt="...">
  												</div>
  												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
												<div>
    												<span class="btn btn-default btn-file">
    													<span class="fileinput-new">Select image</span>
    													<span class="fileinput-exists">Change</span><input type="file" name="..."></span>
    													<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  												</div>
											</div>
    					          		</div>
				            	</div>
				            </div>
			            </div>
			        </div>
       			</div>
  	   			<div class="row">
                    <div class="form-group col-sm-12">
  					    <div class="panel panel-default">
  							<div class="panel-heading" id="equipo">
					            <i class="glyphicon glyphicon-star ico-panel"></i>
					                <?php echo lang('form_label_equipo');?>
					                    <div class="pull-right">
	                        				<div class="btn-group">
					                            <button class="btn btn-default btn-xs dropdown-toggle " type="button" data-toggle="collapse" data-target="#equipo_body">
					                                <i id="flecha_equipo" class="fa fa-chevron-down"></i>
					                            </button>
	                        				</div>
	                    				</div>
	                		</div>
				            <div class="panel-body collapse" id="equipo_body">
				                 <div class="row">
				                        <div class="form-group col-sm-6">
				                           <?php echo form_dropdown('id_equipo', $equipos, $equipo, 'class="form-control"'); ?>
				                        </div>
				                        <div class="form-group  col-sm-6">
				                        	  <?php echo form_dropdown('id_tipo_estado_jugador', $estados, $estado, 'class="form-control"'); ?>
                                        </div>
				                 </div>
				                 <div class="row">
				                 		<div class="form-group col-sm-12">
				                       		<textarea rows="3" id="txt_Trayectoria" value="<?php echo ($reset) ? '' : set_value('trayectoria',$this->datos_formulario->trayectoria); ?>" name="trayectoria" class="form-control"  maxlength="50" placeholder="<?php echo lang('form_label_trayectoria');?>"></textarea>
				                 		</div>
				            	</div>
				            </div>
			            </div>
			        </div>
</div>		          
 	   			<div class="row">
					<div class="form-group col-sm-12">
						<div class="panel panel-default">
					        <div class="panel-heading" id="domicilio">
					            <i class="glyphicon glyphicon-home ico-panel"></i>
					                 <?php echo lang('form_panel_domicilio');?>
										<div class="pull-right">
	                        				<div class="btn-group">
					                            <button class="btn btn-default btn-xs dropdown-toggle " type="button" data-toggle="collapse" data-target="#domicilio_body">
					                                <i id="flecha_domicilio" class="fa fa-chevron-down"></i>
					                            </button>
	                        				</div>
				                    	</div>
				           	</div>
						    <div class="panel-body collapse" id="domicilio_body">
			                	<div class="form-group">
						            <input type="text" id="txt_Calle" name="calle" class="form-control"  maxlength="100" placeholder="<?php echo lang('form_label_calle');?>">
				                </div>
				                <div class="row">
				                        <div class="form-group  col-sm-3 col-xs-12">
				                            <input type="text" id="txt_Numero" class="form-control" name="numero"  maxlength="5" placeholder="<?php echo lang('form_label_numero_calle');?>">
				                        </div>
				                        <div class="form-group col-sm-3 col-xs-12">
				                            <input type="text" id="txt_Piso" name="piso" class="form-control" maxlength="2" placeholder="<?php echo lang('form_label_piso');?>">
				                        </div>
				                        <div class="form-group col-sm-3 col-xs-12">
				                            <input type="text" id="txt_Dto" class="form-control" maxlength="4" placeholder="<?php echo lang('form_label_departamento');?>">
				                        </div>
				                        <div class="form-group col-sm-3 col-xs-12">
				                            <input id="txt_CP" class="form-control" name="codigopostal"  maxlength="8" placeholder="<?php echo lang('form_label_codigo_postal');?>">
				                        </div>
				                    </div>
				                <div class="row">
				                        <div class="form-group col-sm-4 col-xs-12">
				                            <?php echo form_dropdown('id_tipo_provincia', $provincias, $provincia, 'class="form-control"'); ?>
				                        </div>
				                        <div class="form-group col-sm-8 col-xs-12">
				                             <input type="text" id="txt_Localidad" class="form-control" name="localidad"  maxlength="8" placeholder="<?php echo lang('form_label_localidad');?>">
				                        </div>
				                    </div>
				                <div class="row">
				                        <div class="form-group col-sm-4 col-xs-12">
				                            <input id="txt_Telefono" class="form-control" name="telefono"  maxlength="11" placeholder="<?php echo lang('form_label_telefono');?>">
				                        </div>
				                        <div class="form-group col-sm-4 col-xs-12">
				                            <input id="txt_Celulalar" class="form-control" name="celular"  maxlength="11" placeholder="<?php echo lang('form_label_celular');?>">
				                        </div>
				                        <div class="form-group col-sm-4 col-xs-12">
				                            <input id="txt_Radio" class="form-control" name="radio"  maxlength="15" placeholder="<?php echo lang('form_label_radio');?>">
				                        </div>
				                        <div class="form-group col-xs-12">
				                            <input type="email" id="txt_Mail" class="form-control" name="mail"  maxlength="100" placeholder="<?php echo lang('form_label_mail');?>">
						                        </div>
						                    </div>
							</div>
				        </div>
				    </div>
                </div>
	   			<div class="row">
  				<div class="form-group col-sm-12">
            			<div class="col-lg-12" style="text-align: right; padding-top: 20px; padding-bottom: 10px;">
                        	<a id="btn_eliminar" href="<?php echo $eliminar; ?>" class="btn boton  boton-azul  btn-ancho120" role="button">
               			    	<i class="fa fa-trash-o"></i><?php echo lang('form_button_eliminar');?>
                			</a>
			 				<button id="btn_grabar" type="submit" class="btn boton  boton-azul  btn-ancho120">
			                    <i class="fa fa-save"></i><?php echo lang('form_button_grabar');?>
			                </button>
			                <a id="btn_cancelar" href="<?php echo $cancelar; ?>" class="btn boton  boton-azul  btn-ancho120" role="button">
			                    <i class="fa fa-times"></i><?php echo lang('form_button_cancelar');?>
			                </a>
			            </div>
   				</div>
			</div>
     	</div>        
   	    </div>
    </div>
</div>
</form>
     
   
    