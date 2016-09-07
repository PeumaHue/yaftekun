<section id="content">
	<form id="participante" data-toggle="validator"
		action="<?php echo $accion; ?>" method="POST"
		class="bootstrap-validator-form">

      	<?php $this->load->view('arbitros/form_hdr_arbitro.php'); ?> 

		<!--//TODO - Investigar para agregar los botones de guadar y eliminar etc  -->
		<!-- BOTON DE ALTA -->
		<button class="btn btn-float btn-danger m-btn">
			<i class="zmdi zmdi-plus" onclick="<?php echo base_url("arbitro/alta");?>"></i>
		</button>

		<div class="card m-b-0 ">			<!--Es la tarjeta Principal y que no debe tocarse -->

			<!-- PANEL FORM CARGA -->

			<div class="card-body p-b-0 p-t-0 " id="profile-main">

				<!-- GRUPO IMAGEN JUGADOR-->
				<!--//TODO: Quitar estilo de abajo  -->
				<div class="pm-overview c-overflow mCustomScrollbar _mCS_4 mCS-autoHide"	style="overflow: visible;">
					 <div id="mCSB_4" class="mCustomScrollBox mCS-minimal-dark mCSB_vertical_horizontal mCSB_outside" tabindex="0">  
						<!--//TODO: Quitar posicionamiento del div de abajo  -->
						<div id="mCSB_4_container" class="mCSB_container mCS_x_hidden mCS_no_scrollbar_x"  style="position: relative; top: 0px; left: 0px; width: 100%; " dir="ltr"> 
							<div class="pmo-pic">
								<div class="p-relative">
									<img class="img-responsive mCS_img_loaded" src="<?php echo base_url('img_users/arbitros/'. $this->datos_formulario->nombre_archivo_foto);?>" alt=""> 
									<!-- <a href="" class="pmop-edit"> -->
									 <div class="pmop-edit">
									 <i class="zmdi zmdi-camera"></i><span class="hidden-xs">Actualizar imagen</span>
									<!-- </a> -->
									   
									 </div>
									 <input type="file" id="nombre_archivo_foto" name="nombre_archivo_foto" style="display:none;" class="pmop-edit">
									 
							<input type="file" id="myInput"/>
    <a href="" id="myAnchor">Launch File Upload</a>
									 
								</div>
								<div class="pmo-stat" ><?php echo (empty($this->datos_formulario->nombre) ? 'Sin información' : $this->datos_formulario->nombre ); ?></div>
								
							</div>

							<div class="pmo-block pmo-contact hidden-xs">
								<h2>Contacto</h2>

								<ul>
									<li><i class="zmdi zmdi-phone"></i><?php echo (empty($this->datos_formulario->telefono) ? 'Sin informar' : $this->datos_formulario->telefono ); ?></li>
									<li><i class="zmdi zmdi-email"></i><?php echo (empty($this->datos_formulario->email) ? 'Sin informar' : $this->datos_formulario->email ); ?></li>

									<li><i class="zmdi zmdi-pin"></i>
										<!-- <address class="m-b-0 ng-binding"> 44-46 Morningside Road,<br> Edinburgh,<br> Scotland </address> -->
										<!-- Aca hay que concatenar todo el domicilio  -->
										<address class="m-b-0 ng-binding"><?php echo (empty($this->datos_formulario->calle) ? 'Sin informar' : $this->datos_formulario->calle ); ?></address>
									</li>
								</ul>
							</div>

					 	</div>
					</div>
				
				</div>
				<!-- FIN GRUPO IMAGEN JUGADOR-->
				
				<div class="pm-body clearfix">


					<!--DATOS DEL JUGADOR-->
					<div class="pmb-block">
						<div class="pmbb-header ">
							<h2>
								<i class="zmdi zmdi-account m-r-5"></i>Datos del participante
							</h2>
						</div>
						<div class="pmbb-body p-l-30">
							<div class="pmbb-view">
								<dl class="  col-md-6">
									<dd>
										<div class="form-group fg-float">
											<div class="fg-line">
													<label class="fg-label"><?php echo lang('form_label_apellido');?></label>
													<input type="text" id="txt_Apellido" value="<?php echo ($reset) ? '' : set_value('apellido',$this->datos_formulario->apellido); ?>" name="apellido" class="form-control"  maxlength="100" >
											</div>
										</div>
									</dd>
								</dl>
								<dl class="col-md-6">
									<dd>
										<div class="form-group  fg-float">
											<div class="fg-line">
												<input type="text" id="txt_Nombre"   value="<?php echo ($reset) ? '' : set_value('nombre',$this->datos_formulario->nombre); ?>" name="nombre" class="datepicker form-control"  maxlength="100" >
												<label class="fg-label"><?php echo lang('form_label_nombre');?></label>
											</div>
										</div>
									</dd>
								</dl>
								<br />
								<dl class="col-md-4">
									<dd>
										<div class="form-group ">
											<div class="fg-line">
												<div class="select">
													<?php echo form_dropdown('id_tipo_doc', $documentos, set_value('id_tipo_doc',$this->datos_formulario->id_tipo_doc), 'class="form-control"'); ?>
												</div>
											</div>
										</div>
									</dd>
								</dl>
								<dl class="col-md-4">
									<dd>
										<div class="form-group fg-float ">
											<div class="fg-line">
										 		<input type="text" id="txt_NroDoc" value="<?php echo ($reset) ? '' : set_value('nro_doc',$this->datos_formulario->nro_doc); ?>" class="form-control" name="nro_doc"  maxlength="8" >
			                    				<label class="fg-label"><?php echo lang('form_label_numero_documento');?></label>
											</div>
										</div>
									</dd>
								</dl>
								<dl class="col-md-4">
									<dd>

										<div class="form-group fg-float ">
											<div class="fg-line">
											        <input id="txt_FechaNacimiento" value="<?php echo ($reset) ? '' : set_value('fecha_nacimiento',$this->datos_formulario->fecha_nacimiento); ?>" class="form-control" name="fecha_nacimiento" data-date-format="YYYY-MM-DD" >
	                		    					<label class="fg-label"><?php echo lang('form_label_fecha_nacimiento');?></label>
											</div>
										</div>
									</dd>
								</dl>
								<dl class="col-md-6">
									<dd>

										<div class="form-group fg-float ">
											<div class="fg-line">
									   	 		<input id="txt_Nacionalidad" value="<?php echo ($reset) ? '' : set_value('nacionalidad',$this->datos_formulario->nacionalidad); ?>" class="form-control" name="nacionalidad"  maxlength="10" >
	                        					<label class="fg-label"><?php echo lang('form_label_nacionalidad');?></label>
											</div>
										</div>
									</dd>
								</dl>
								<dl class="col-md-6">
									<dd>
										<div class="form-group ">
											<div class="fg-line">
												<div class="select">
					                      			<?php echo form_dropdown('id_tipo_estado_civil', $estados_civiles, set_value('id_tipo_estado_civil',$this->datos_formulario->id_tipo_estado_civil), 'class="form-control"'); ?>
	     										</div>
											</div>
										</div>
									</dd>
								</dl>

								<dl class="col-md-12">
									<dd>

										<div class="form-group  fg-float">
											<div class="fg-line">
								           		<input type="text" id="txt_Conyugue" value="<?php echo ($reset) ? '' : set_value('conyuge_nombre',$this->datos_formulario->conyuge_nombre); ?>" name="conyuge_nombre" class="form-control"  maxlength="50" >
	                  							<label class="fg-label"><?php echo lang('form_label_nombre_conyuge');?></label>
											</div>
										</div>
									</dd>
								</dl>

							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<!--FIN DATOS DEL JUGADOR-->
					<!--COLAPSABLES-->
					<div class="pmb-block">
						<div class="panel-group " role="tablist"
							aria-multiselectable="true">
							<!--FICHA MEDICA-->
							<div class="panel panel-collapse ">
								<div class="panel-heading" role="tab" id="headingOne">

									<h4 class="panel-title ">
										<a class="collapsed f-15" data-toggle="collapse"
											data-parent="#accordion" href="#collapseOne"
											aria-expanded="false" aria-controls="collapseOne"> <i
											class="zmdi  zmdi-favorite m-r-5"></i> Ficha Médica
										</a>
									</h4>
								</div>

								<div id="collapseOne" class="collapse" role="tabpanel"
									aria-labelledby="headingOne" aria-expanded="true">
									<div class="panel-body">


										<div class="pmbb-body p-l-30 p-t-15 p-b-20">
											<div class="pmbb-view">
												<dl class="  col-md-6">
													<dd>
														<div class="form-group fg-float">
															<div class="fg-line">
																<input type="text" class="form-control "
																	id="txt_Cobertura_Medica" name="cobertura_medica"
																	maxlength="100"> <label class="fg-label">Cobertura
																	médica</label>
															</div>
														</div>
													</dd>
												</dl>
												<dl class="col-md-6">
													<dd>
														<div class="form-group fg-float">
															<div class="fg-line">
																<input type="text" class="form-control "
																	id="txt_Fecha_apto_medico" name="fecha_apto_medico"
																	maxlength="100"> <label class="fg-label">Fecha de
																	caducidad de apto médico</label>
															</div>
														</div>
													</dd>
												</dl>

												<div class="fileinput fileinput-new"
													data-provides="fileinput">
													<div class="fileinput-preview thumbnail"
														data-trigger="fileinput"></div>
													<div>
														<span class="btn btn-info btn-file waves-effect"> <span
															class="fileinput-new">Select image</span> <span
															class="fileinput-exists">Change</span> <input type="file"
															name="...">
														</span> <a href="#"
															class="btn btn-danger fileinput-exists waves-effect"
															data-dismiss="fileinput">Remove</a>
													</div>
												</div>

											</div>

										</div>
									</div>
								</div>
							</div>
							<!--FICHA MEDICA-->
							<!--EQIPO-->
							<div class="panel panel-collapse">
								<div class="panel-heading" role="tab" id="headingTwo">
									<h4 class="panel-title">
										<a class="collapsed f-15" data-toggle="collapse"
											data-parent="#accordion" href="#collapseTwo"
											aria-expanded="false" aria-controls="collapseTwo"> <i
											class="zmdi  zmdi-shield-security m-r-5"></i> Equipo
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="collapse" role="tabpanel"
									aria-labelledby="headingTwo" aria-expanded="false"
									style="height: 0px;">
									<div class="panel-body">
										<div class="pmbb-body p-l-30 p-t-15 p-b-20">
											<div class="pmbb-view">
												<dl class="  col-md-6">
													<dd>
														<div class="form-group ">
															<div class="fg-line">
																<div class="select">
																	<select class="form-control" name="id_equipo">
																		<option>Equipo</option>
																		<option>Option 1</option>
																		<option>Option 2</option>
																		<option>Option 3</option>
																		<option>Option 4</option>
																		<option>Option 5</option>
																	</select>
																</div>
															</div>
														</div>
													</dd>
												</dl>
												<dl class="col-md-6">
													<dd>
														<div class="form-group  ">
															<div class="fg-line">
																<div class="select">
																	<select class="form-control"
																		name="id_tipo_estado_jugador">
																		<option>Estado Actual</option>
																		<option>Option 1</option>
																		<option>Option 2</option>
																		<option>Option 3</option>
																		<option>Option 4</option>
																		<option>Option 5</option>
																	</select>
																</div>
															</div>
														</div>
													</dd>
												</dl>
												<dl class="col-md-12">
													<dd>
														<div class="form-group fg-float ">
															<div class="fg-line">
																<input type="text" class="form-control fg-input"
																	id="txt_Trayectoria" name="trayectoria" maxlength="100" />
																<label class="fg-label">Trayectoria</label>
															</div>
														</div>
													</dd>
												</dl>


											</div>

										</div>
									</div>
								</div>
							</div>
							<!--FIN EQIPO-->
							<!--DOMICILIO-->
							<div class="panel panel-collapse">
								<div class="panel-heading" role="tab" id="headingThree">
									<h4 class="panel-title">
										<a class="collapsed f-15" data-toggle="collapse"
											data-parent="#accordion" href="#collapseThree"
											aria-expanded="false" aria-controls="collapseThree"> <i
											class="zmdi   zmdi-pin m-r-5"></i> Domicilio
										</a>
									</h4>
								</div>
								<div id="collapseThree" class="collapse" role="tabpanel"
									aria-labelledby="headingThree">
									<div class="panel-body">
										<div class="pmbb-view m-t-10">
											<dl class="  col-md-12">
												<dd>
													<div class="form-group fg-float ">
														<div class="fg-line">
															<input type="text" class="form-control fg-input"
																id="txt_Calle" value="" name="calle" maxlength="100" />
															<label class="fg-label">Calle</label>
														</div>
													</div>
												</dd>
											</dl>
											<br />
											<dl class="col-md-3 col-sm-6">
												<dd>
													<div class="form-group fg-float ">
														<div class="fg-line">
															<input type="text" class="form-control fg-input"
																id="txt_Numero" value="" name="numero" maxlength="5"
																data-mask="00000" /> <label class="fg-label">Número</label>
														</div>
													</div>
												</dd>
											</dl>
											<dl class="col-md-3 col-sm-6">
												<dd>
													<div class="form-group fg-float ">
														<div class="fg-line">
															<input type="text" class="form-control fg-input"
																id="txt_Piso" value="" name="piso" maxlength="2" /> <label
																class="fg-label">Piso</label>
														</div>
													</div>
												</dd>
											</dl>
											<dl class="col-md-3 col-sm-6">
												<dd>
													<div class="form-group fg-float ">
														<div class="fg-line">
															<input type="text" class="form-control fg-input"
																id="txt_Dto" value="" name="dto" maxlength="4" /> <label
																class="fg-label">Dto</label>
														</div>
													</div>
												</dd>
											</dl>
											<dl class="col-md-3 col-sm-6">
												<dd>
													<div class="form-group fg-float ">
														<div class="fg-line">
															<input type="text" class="form-control fg-input"
																id="txt_CP" value="" name="codpostal" maxlength="8"
																data-mask="00000000" /> <label class="fg-label">Código
																postal</label>
														</div>
													</div>
												</dd>
											</dl>
											<br />
											<dl class="col-md-6">
												<dd>
													<div class="form-group ">
														<div class="fg-line">
															<div class="select">
																<select name="id_provincia" class="form-control"
																	name="id_tipo_estado_jugador">
																	<option>Provincia</option>
																	<option>Option 1</option>
																	<option>Option 2</option>
																	<option>Option 3</option>
																	<option>Option 4</option>
																	<option>Option 5</option>
																</select>
															</div>
														</div>
													</div>
												</dd>
											</dl>
											<dl class="col-md-6">
												<dd>
													<div class="form-group fg-float ">
														<div class="fg-line">
															<input type="text" class="form-control fg-input"
																id="txt_Localidad" value="" name="localidad"
																maxlength="50" /> <label class="fg-label">Localidad</label>
														</div>
													</div>
												</dd>
											</dl>
											<br />
											<dl class="col-md-4">
												<dd>
													<div class="form-group fg-float ">
														<div class="fg-line">
															<input type="text" class="form-control fg-input"
																id="txt_Telefono" value="" name="telefono"
																maxlength="11" data-mask="00000000000" /> <label
																class="fg-label">Teléfono</label>
														</div>
													</div>
												</dd>
											</dl>
											<dl class="col-md-4">
												<dd>
													<div class="form-group fg-float ">
														<div class="fg-line">
															<input type="text" class="form-control fg-input"
																id="txt_Celular" value="" name="telefono_celular"
																maxlength="11" data-mask="00000000000" /> <label
																class="fg-label">Teléfono celular</label>
														</div>
													</div>
												</dd>
											</dl>
											<dl class="col-md-4">
												<dd>
													<div class="form-group fg-float ">
														<div class="fg-line">
															<input type="text" class="form-control fg-input"
																id="txt_Radio" value="" name="telefono_radio"
																maxlength="11" data-mask="00000000000" /> <label
																class="fg-label">Teléfono radio</label>
														</div>
													</div>
												</dd>
											</dl>
											<br />
											<dl class="col-md-12">
												<dd>
													<div class="form-group fg-float ">
														<div class="fg-line">
															<input type="text" class="form-control fg-input"
																id="txt_Mail" value="" name="email" maxlength="11"
																data-mask="00000000000" /> <label class="fg-label">Mail</label>
														</div>
													</div>
												</dd>
											</dl>
										</div>
									</div>
								</div>
							</div>
							<!--FIN DOMICILIO-->
						</div>
					</div>

				</div>
			</div>

			<!-- FIN PANEL FORM CARGA -->

		</div>
		<?php echo form_hidden('id_participante', $this->datos_formulario->id_participante); ?>
		<?php echo form_hidden('id_tipo_participante', $this->datos_formulario->id_tipo_participante); ?>
		<?php echo form_hidden('imagen_original_perfil', $this->datos_formulario->nombre_archivo_foto); ?>
		
	</form>
</section>
