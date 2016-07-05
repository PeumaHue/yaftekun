<form id="participante" data-toggle="validator" action="<?php echo $accion; ?>" method="POST" enctype="multipart/form-data"> 
	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading"> 
				<i class="glyphicon glyphicon-user ico-panel" ></i><?php echo $agregar_o_editar; ?>
			</div>
	 		<div class="panel-body">
					<div class="row">
						<div class="col-sm-3">
							<div class="row">
	            				<div class="form-group col-sm-12">
	            					<div align="center">
										<div class="thumbnail_fotoparticipante">
											<div id="thumbnail_fotoparticipante_caption"></div>
								   	    	<img id="foto" class="img-thumbnail" src="<?php echo base_url('images/jugadores/'. $this->datos_formulario->nombre_archivo_foto);?>" />
										</div>
									    <input type="file" id="nombre_archivo_foto" name="nombre_archivo_foto" class="filestyle" data-buttonName="btn-primary" data-input="false">
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-9">
								<div class="row">
									<div class="form-group col-sm-6">
										<input type="text" id="txt_Apellido" value="<?php echo ($reset) ? '' : set_value('apellido',$this->datos_formulario->apellido); ?>" name="apellido" class="form-control"  maxlength="100" placeholder="<?php echo lang('form_label_apellido');?>">
									</div>
									<div class="form-group col-sm-6">
										<input type="text" id="txt_Nombre"   value="<?php echo ($reset) ? '' : set_value('nombre',$this->datos_formulario->nombre); ?>" name="nombre" class="datepicker form-control"  maxlength="100" placeholder="<?php echo lang('form_label_nombre');?>">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4 col-sm-4 col-xs-12">
	    	 							<?php echo form_dropdown('id_tipo_doc', $documentos, set_value('id_tipo_doc',$this->datos_formulario->id_tipo_doc), 'class="form-control"'); ?>
			                        </div>
									<div class="form-group col-md-4 col-sm-4 col-xs-12">
	                            		<input type="text" id="txt_NroDoc" value="<?php echo ($reset) ? '' : set_value('nro_doc',$this->datos_formulario->nro_doc); ?>" class="form-control" name="nro_doc"  maxlength="8" placeholder="<?php echo lang('form_label_numero_documento');?>">
			                        </div>
									<div class="form-group col-md-4 col-sm-4 col-xs-12">
	        		                    <input id="txt_FechaNacimiento" value="<?php echo ($reset) ? '' : set_value('fecha_nacimiento',$this->datos_formulario->fecha_nacimiento); ?>" class="form-control" name="fecha_nacimiento" data-date-format="YYYY-MM-DD" placeholder="<?php echo lang('form_label_fecha_nacimiento');?>">
	                		        </div>
								</div>
								<div class="row">
									<div class="form-group col-md-4 col-sm-4 col-xs-12">
	                           	 		<input id="txt_Nacionalidad" value="<?php echo ($reset) ? '' : set_value('nacionalidad',$this->datos_formulario->nacionalidad); ?>" class="form-control" name="nacionalidad"  maxlength="10" placeholder="<?php echo lang('form_label_nacionalidad');?>">
	                        		</div>
									<div class="form-group col-md-4 col-sm-4 col-xs-12">
	                           			<?php echo form_dropdown('id_estado_civil', $estados_civiles, set_value('id_estado_civil',$this->datos_formulario->id_estado_civil), 'class="form-control"'); ?>
	                        		</div>
									<div class="form-group col-md-4 col-sm-8 col-xs-12">
	                            		<input type="text" id="txt_Conyugue" value="<?php echo ($reset) ? '' : set_value('conyuge_nombre',$this->datos_formulario->conyuge_nombre); ?>" name="conyuge_nombre" class="form-control"  maxlength="50" placeholder="<?php echo lang('form_label_nombre_conyuge');?>">
	                        		</div>
								</div>
								<div class="row"></div>
								<div class="row">
									<div class="col-sm-12">
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
													<div class="form-group col-sm-6">
														<input type="text" formnovalidate id="txt_Fecha_apto_medico" value="<?php echo ($reset) ? '' : set_value('fecha_apto_medico',$this->datos_formulario->conyuge_nombre); ?>" name="fecha_apto_medico" class="form-control"  maxlength="50" placeholder="<?php echo lang('form_label_fecha_apto_medico');?>">
													</div>
												</div>
												<div class="row">
													<div class="form-group col-sm-12">
													<div align="center">
														<div class="thumbnail_aptomedico">
															<div id="thumbnail_aptopmedico_caption"></div>
								   	    						<img id="imagen_certificado" class="img-thumbnail_aptomedico" src="<?php echo ($reset) ? '' : base_url('images/certificados_medicos/'. $this->datos_formulario->nombre_archivo_apto_medico);?>" />
															</div>
									   						 <input type="file" id="nombre_archivo_apto_medico" name="nombre_archivo_apto_medico" class="filestyle" data-buttonName="btn-primary" data-input="false">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="panel panel-default">
											<div class="panel-heading" id="equipo">
												<i class="glyphicon glyphicon-star ico-panel"></i>
												<?php echo lang('form_label_equipo');?>
												<div class="pull-right">
													<div class="btn-group">
														<button class="btn btn-default btn-xs dropdown-toggle " type="button" data-toggle="collapse" data-target="#equipo_body"><i id="flecha_equipo" class="fa fa-chevron-down"></i></button>
													</div>
												</div>
											</div>
											<div class="panel-body collapse" id="equipo_body">
												<div class="row">
													<div class="form-group col-sm-6">
														<?php echo form_dropdown('id_equipo', $equipos, set_value('id_equipo',$this->datos_formulario->id_equipo), 'class="form-control"'); ?>
													</div>
													<div class="form-group  col-sm-6">
														<?php echo form_dropdown('id_tipo_estado_jugador', $estados, set_value('id_tipo_estado_jugador',$this->datos_formulario->id_tipo_estado_jugador), 'class="form-control"'); ?>
													</div>
												</div>
												<div class="row">
													<div class="form-group col-sm-12">
														<textarea rows="3" id="txt_Trayectoria" name="trayectoria" class="form-control"  maxlength="50" placeholder="<?php echo lang('form_label_trayectoria');?>"><?php echo ($reset) ? '' : set_value('trayectoria',$this->datos_formulario->trayectoria); ?></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>		          
								<div class="row">		
									<div class="col-sm-12">
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
												<div class="row">
													<div class="form-group col-sm-12 col-xs-12">
														<input type="text" id="txt_Calle" value="<?php echo ($reset) ? '' : set_value('calle',$this->datos_formulario->calle); ?>" name="calle" class="form-control"  maxlength="100" placeholder="<?php echo lang('form_label_calle');?>">
													</div>
												</div>
												<div class="row">
													<div class="form-group  col-sm-3 col-xs-12">
														<input type="text" id="txt_Numero" value="<?php echo ($reset) ? '' : set_value('numero',$this->datos_formulario->numero); ?>"  class="form-control" name="numero"  maxlength="5" placeholder="<?php echo lang('form_label_numero_calle');?>">
													</div>
													<div class="form-group col-sm-3 col-xs-12">
														<input type="text" id="txt_Piso" value="<?php echo ($reset) ? '' : set_value('piso',$this->datos_formulario->piso); ?>" name="piso"  class="form-control" maxlength="2" placeholder="<?php echo lang('form_label_piso');?>">
													</div>
													<div class="form-group col-sm-3 col-xs-12">
														<input type="text" id="txt_Dto" value="<?php echo ($reset) ? '' : set_value('depto',$this->datos_formulario->depto); ?>" name="depto" class="form-control" maxlength="4" placeholder="<?php echo lang('form_label_departamento');?>">
													</div>
													<div class="form-group col-sm-3 col-xs-12">
														<input id="txt_CP" value="<?php echo ($reset) ? '' : set_value('codpostal',$this->datos_formulario->codpostal); ?>" class="form-control" name="codpostal"  maxlength="8" placeholder="<?php echo lang('form_label_codigo_postal');?>">
													</div>
												</div>
												<div class="row">
													<div class="form-group col-sm-4 col-xs-12">
														<?php echo form_dropdown('id_provincia', $provincias, set_value('id_provincia',$this->datos_formulario->id_provincia), 'class="form-control"'); ?>
													</div>
													<div class="form-group col-sm-8 col-xs-12">
														<input type="text" id="txt_Localidad" value="<?php echo ($reset) ? '' : set_value('localidad',$this->datos_formulario->localidad); ?>" class="form-control" name="localidad"  maxlength="8" placeholder="<?php echo lang('form_label_localidad');?>">
													</div>
												</div>
												<div class="row">
													<div class="form-group col-sm-4 col-xs-12">
														<input id="txt_Telefono" value="<?php echo ($reset) ? '' : set_value('telefono',$this->datos_formulario->telefono); ?>" class="form-control" name="telefono"  maxlength="11" placeholder="<?php echo lang('form_label_telefono');?>">
													</div>
													<div class="form-group col-sm-4 col-xs-12">
														<input id="txt_Celulalar" value="<?php echo ($reset) ? '' : set_value('telefono_celular',$this->datos_formulario->telefono_celular); ?>" class="form-control" name="telefono_celular"  maxlength="11" placeholder="<?php echo lang('form_label_celular');?>">
													</div>
													<div class="form-group col-sm-4 col-xs-12">
														<input id="txt_Radio" value="<?php echo ($reset) ? '' : set_value('telefono_radio',$this->datos_formulario->telefono_radio); ?>" class="form-control" name="telefono_radio"  maxlength="15" placeholder="<?php echo lang('form_label_radio');?>">
													</div>
												</div>
												<div class="row">
													<div class="form-group col-xs-12">
														<input type="email" id="txt_Mail" value="<?php echo ($reset) ? '' : set_value('email',$this->datos_formulario->email); ?>" class="form-control" name="email"  maxlength="100" placeholder="<?php echo lang('form_label_mail');?>">
												    </div>
											    </div>
										    </div>
									    </div>
								    </div>
								</div>
						</div>
					 </div>
					<div class="row">
					    <!-- Show the messages in #errors -->
			            <div class="form-group col-sm-12">
			           		<ul id="errors"></ul>
		        		</div>
		       		</div>
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
<?php echo form_hidden('id_participante', $this->datos_formulario->id_participante); ?>
<?php echo form_hidden('id_tipo_participante', $this->datos_formulario->id_tipo_participante); ?>
<?php echo form_hidden('imagen_original_perfil', $this->datos_formulario->nombre_archivo_foto); ?>
<?php echo form_hidden('imagen_original_aptomedico', $this->datos_formulario->nombre_archivo_apto_medico); ?>
</form>



   
    