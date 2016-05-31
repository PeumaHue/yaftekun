<div class="container">
<div class="panel panel-default">
<div class="panel-heading"> 
	<i class="glyphicon glyphicon-user ico-panel" ></i>                      
    <?php echo lang('form_panel_datos_personales');?>
</div>
<div class="panel-body">
<div class="row">
                        <div class="form-group col-sm-6">
                            <input type="text" id="txt_Apellido" name="apellido" class="form-control"  maxlength="100" placeholder="<?php echo lang('form_label_apellido');?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="text" id="txt_Nombre" name="nombre" class="form-control"  maxlength="100" placeholder="<?php echo lang('form_label_nombre');?>">
                        </div>
                    </div>
<div class="row">
                        <div class="form-group col-md-3 col-sm-4 col-xs-12">
                            <select id="ddl_TipoDocumento" name="tipo_documento" class="form-control">
                                <option value="" selected disabled><?php echo lang('form_label_tipo_documento');?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 col-sm-4 col-xs-12">
                            <input type="text" id="txt_NroDoc" class="form-control" name="numero_documento"  maxlength="8" placeholder="<?php echo lang('form_label_numero_documento');?>">
                        </div>
                        <div class="form-group col-md-3 col-sm-4 col-xs-12">
                            <input id="txt_FechaNacimiento" class="form-control" name="fecha_nacimiento"  maxlength="10" placeholder="<?php echo lang('form_label_fehca_nacimiento');?>">
                        </div>
                        <div class="form-group col-md-3 col-sm-4 col-xs-12">
                            <select id="ddl_Nacionalidad" name="nacionalidad" class="form-control">
                                <option value="" selected disabled><?php echo lang('form_label_nacionalidad');?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
<div class="row">
                        <div class="form-group col-md-3 col-sm-4 col-xs-12">
                            <select id="ddl_EstadoCivil" name="estado_civil" class="form-control">
                                <option value="" selected disabled><?php echo lang('form_label_estado_civil');?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-9 col-sm-8 col-xs-12">
                            <input type="text" id="txt_Conyugue" name="conyugue" class="form-control"  maxlength="50" placeholder="<?php echo lang('form_label_nombre_conyuge');?>">
                        </div>
</div>
<div class="row">
                        <div class="form-group col-sm-12">
                            <input type="text" id="txt_CoberturaMedica" name="cobertura_medica" class="form-control"  maxlength="50" placeholder="<?php echo lang('form_label_cobertura_medica');?>">
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
				                        <div class="form-group col-sm-6 col-md-3  col-xs-12">
				                            <select id="ddl_Equipo" class="form-control" name="equipo">
				                                <option value=""><?php echo lang('form_label_equipo');?></option>
				                                <option value="1">1</option>
				                                <option value="2">2</option>
				                                <option value="3">3</option>
				                                <option value="4">4</option>
				                            </select>
				                        </div>
				                        <div class="form-group  col-sm-6 col-md-3  col-xs-12">
				                            <select id="ddl_Posicion" class="form-control" name="posicion">
				                                <option value=""><?php echo lang('form_label_posicion_juego');?></option>
				                                <option value="1">1</option>
				                                <option value="2">2</option>
				                                <option value="3">3</option>
				                                <option value="4">4</option>
				                            </select>
				                        </div>
				                        <div class="form-group  col-sm-6 col-md-3  col-xs-12">
				                            <input type="text" id="txt_Camiseta" class="form-control" name="camiseta"   maxlength="2" placeholder="<?php echo lang('form_label_numero_camiseta');?>">
				                        </div>
				                        <div class="form-group  col-sm-6 col-md-3  col-xs-12">
				                            <select id="ddl_Estado" class="form-control" name="estado">
				                                <option value=""><?php echo lang('form_label_estado');?></option>
				                                <option value="1">Activo</option>
				                                <option value="2">Inactivo</option>
				                            </select>
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
			                        <div class="form-group  col-sm-2 col-xs-12">
			                            <input type="text" id="txt_Numero" class="form-control" name="numero"  maxlength="5" placeholder="<?php echo lang('form_label_numero_calle');?>">
			                        </div>
			                        <div class="form-group col-sm-2 col-xs-12">
			                            <input type="text" id="txt_Piso" name="piso" class="form-control" maxlength="2" placeholder="<?php echo lang('form_label_piso');?>">
			                        </div>
			                        <div class="form-group col-sm-2 col-xs-12">
			                            <input type="text" id="txt_Dto" class="form-control" maxlength="4" placeholder="<?php echo lang('form_label_departamento');?>">
			                        </div>
			                        <div class="form-group col-sm-2 col-xs-12">
			                            <input id="txt_CP" class="form-control" name="codigopostal"  maxlength="8" placeholder="<?php echo lang('form_label_codigo_postal');?>">
			                        </div>
			                    </div>
			                    <div class="row">
			                        <div class="form-group col-sm-4 col-xs-12">
			                            <select id="ddl_Provincia" name="provincia" class="form-control">
			                                <option value="" selected disabled><?php echo lang('form_label_provincia');?></option>
			                                <option value="1">1</option>
			                                <option value="2">2</option>
			                                <option value="3">3</option>
			                                <option value="4">4</option>
			                            </select>
			                        </div>
			                        <div class="form-group col-sm-8 col-xs-12">
			                             <select id="ddl_Localidad" class="form-control" name="localidad">
			                                <option value="" selected disabled><?php echo lang('form_label_localidad');?></option>
			                                <option value="1">1</option>
			                                <option value="2">2</option>
			                                <option value="3">3</option>
			                                <option value="4">4</option>
			                            </select>
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
                <button class="btn boton  boton-azul  btn-ancho120">
                    <i class="fa fa-save"></i><?php echo lang('form_button_grabar');?>
                </button>
                <a class="btn boton  boton-azul  btn-ancho120">
                    <i class="fa fa-trash-o"></i><?php echo lang('form_button_eliminar');?>
                </a>
                <a href="<?php echo site_url("jugador");?>" class="btn boton  boton-azul  btn-ancho120">
                    <i class="fa fa-times"></i><?php echo lang('form_button_cancelar');?>
                </a>
            </div>
   </div>
</div>
</div>        
</div>
</div>
</form>
     
   
    