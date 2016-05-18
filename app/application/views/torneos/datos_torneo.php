                    <div class="form-group col-sm-6">
                    <label class="control-label"><?php echo lang('form_label_nombre');?></label>                 
                        <input type="text" id="txt_NombreTorneo" value="<?php echo set_value('nombre',$this->datos_formulario->nombre); ?>" class="form-control" name="nombre" placeholder="Ingrese el nombre del torneo" maxlength="200">
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label"><?php echo lang('form_label_cantidad_equipos');?></label>
                    <input type="text" id="txt_CantidadEquipos" value="<?php echo set_value('cantidad_equipos',$this->datos_formulario->cantidad_equipos); ?>" class="form-control" name="cantidad_equipos" placeholder="Ingrese la cantidad de equipos" onkeypress="return validarNumeroControl(event)" maxlength="4">
                </div>
                <div class="form-group col-sm-3">
                    <label class="control-label"><?php echo lang('form_label_modalidad_juego');?></label>
                    <?php echo form_dropdown('modalidad_juego', $modalidades, '', 'class="form-control"'); ?>
                </div>
           
            <div class="row">
                <!-- <div class="form-group col-sm-2">
                    <label class="control-label">Año del Torneo</label>
                    <input type="text" id="txt_Anio" class="form-control" name="anio" placeholder="Ingrese el año" onkeypress="return validarNumeroControl(event)" maxlength="4">
                </div>-->                
            </div>
        
            <div class="panel-error">
                <?php echo $mensaje; ?>
            </div>

            <div class="col-lg-12" style="text-align: right; padding-top: 30px; padding-bottom: 10px;">

                <button type="submit" class="btn boton  boton-azul  btn-ancho120">
                    <i class="fa fa-save"></i><?php echo lang('form_button_grabar');?>
                </button>

                <a href="#" class="btn boton  boton-azul  btn-ancho120" role="button">
                    <i class="fa fa-trash-o"></i><?php echo lang('form_button_eliminar');?>
                </a>

                <a href="<?php echo $cancelar; ?>" class="btn boton  boton-azul  btn-ancho120" role="button">
                    <i class="fa fa-times"></i><?php echo lang('form_button_cancelar');?>
                </a>
            </div>
        </div>
    </form>