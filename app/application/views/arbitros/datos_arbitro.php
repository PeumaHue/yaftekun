

		<div class="panel panel-default">
                <div class="panel-heading">  
                <i class="glyphicon glyphicon-user ico-panel" ></i>                      
                       <?php echo lang('form_panel_datos_personales');?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label class="control-label"><?php echo lang('form_label_apellido');?></label>
                            <input type="text" id="txt_Apellido" name="apellido" class="form-control"  maxlength="100">
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label"><?php echo lang('form_label_nombre');?></label>
                            <input type="text" id="txt_Nombre" name="nombre" class="form-control"  maxlength="100">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2 col-sm-4 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_tipo_documento');?></label>
                            <select id="ddl_TipoDocumento" name="tipo_documento" class="form-control">
                                <option value="">[ SELECCIONE ]</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-sm-4 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_numero_documento');?></label>
                            <input type="text" id="txt_NroDoc" class="form-control" name="numero_documento"  maxlength="8">
                        </div>
                        <div class="form-group col-md-2 col-sm-4 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_fehca_nacimiento');?></label>
                            <input id="txt_FechaNacimiento" class="form-control" name="fecha_nacimiento"  maxlength="10">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_nacionalidad');?></label>
                            <select id="ddl_Nacionalidad" name="nacionalidad" class="form-control">
                                <option value="">[ SELECCIONE ]</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="control-label"><?php echo lang('form_label_cobertura_medica');?></label>
                            <input type="text" id="txt_CoberturaMedica" name="cobertura_medica" class="form-control"  maxlength="50">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3 col-sm-4 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_estado_civil');?></label>
                            <select id="ddl_EstadoCivil" name="estado_civil" class="form-control">
                                <option value="">[ SELECCIONE ]</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group col-md-9 col-sm-8 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_nombre_conyuge');?></label>
                            <input type="text" id="txt_Conyugue" name="conyugue" class="form-control"  maxlength="50">
                        </div>
                    </div>
                </div>
            </div>

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
                        <label class="control-label"><?php echo lang('form_label_calle');?></label>
                        <input type="text" id="txt_Calle" name="calle" class="form-control"  maxlength="100">
                    </div>
                    <div class="row">
                        <div class="form-group  col-sm-2 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_numero_calle');?></label>
                            <input type="text" id="txt_Numero" class="form-control" name="numero"  maxlength="5">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_piso');?></label>
                            <input type="text" id="txt_Piso" name="piso" class="form-control" maxlength="2">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_departamento');?></label>
                            <input type="text" id="txt_Dto" class="form-control" maxlength="4">
                        </div>
                        <div class="form-group col-sm-2 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_codigo_postal');?></label>
                            <input id="txt_CP" class="form-control" name="codigopostal"  maxlength="8">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_provincia');?></label>
                            <select id="ddl_Provincia" name="provincia" class="form-control">
                                <option value="">[ SELECCIONE ]</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-8 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_localidad');?></label>
                            <select id="ddl_Localidad" class="form-control" name="localidad">
                                <option value="">[ SELECCIONE ]</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_telefono');?></label>
                            <input id="txt_Telefono" class="form-control" name="telefono"  maxlength="11">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_celular');?></label>
                            <input id="txt_Celulalar" class="form-control" name="celular"  maxlength="11">
                        </div>
                        <div class="form-group col-sm-4 col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_radio');?></label>
                            <input id="txt_Radio" class="form-control" name="radio"  maxlength="15">
                        </div>
                        <div class="form-group col-xs-12">
                            <label class="control-label"><?php echo lang('form_label_mail');?></label>
                            <input type="email" id="txt_Mail" class="form-control" name="mail"  maxlength="100">
                        </div>
                    </div>

                </div>
            </div>
	
	 <div class="col-lg-12" style="text-align: right; padding-top: 30px; padding-bottom: 10px;">

                <button class="btn boton  boton-azul  btn-ancho120">
                    <i class="fa fa-save"></i><?php echo lang('form_button_grabar');?>
                </button>

                <a class="btn boton  boton-azul  btn-ancho120">
                    <i class="fa fa-trash-o"></i><?php echo lang('form_button_eliminar');?>
                </a>

                <a class="btn boton  boton-azul  btn-ancho120">
                    <i class="fa fa-times"></i><?php echo lang('form_button_cancelar');?>
                </a>
            </div>
	</div>
</form>