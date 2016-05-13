<form id="equipos" data-toggle="validator" action="none" method="POST">
<div class="container ">
<div class=" panel panel-green  ">
<div class="panel-heading ">

<h1 class="input-group"><?php echo lang('html_equipo_titulo_default');?></h1>
</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">
<?php echo lang('form_label_equipos');?>
<div class="pull-right">
<div class="btn-group">
<button class="btn btn-default btn-xs dropdown-toggle " type="button" data-toggle="collapse" data-target="#equipo_body" aria-expanded="true">
<i id="flecha_equipo" class="fa fa-chevron-up"></i>
</button>
</div>
</div>
</div>
<div class="panel-body collapse in" id="equipo_body" aria-expanded="true">

<ul class="list-inline small interlineado-X1">
	<?php foreach ($equipos as $equipo): ?>
	<li class="col-xs-12 col-sm-3"><?php echo $equipo['nombre']; ?></li>
	<?php endforeach;?>
</ul>
</div>

</div>

<label><?php echo lang('form_label_nombre');?></label>
<div class="form-group">
<div class="input-group col-xs-12">

<input type="text" id="txt_Nombre" name="nombre" class="form-control" placeholder="<?php echo lang('form_label_ayuda_nombre_equipo');?>" maxlength="100">

<span class="input-group-btn">
<button class="btn btn-default" type="button">
<i class="fa fa-search"></i>
</button>
</span>


</div>
</div>
<div class="form-group">
<label><?php echo lang('form_label_equipo_imagen');?></label>
<input type="file" >
</div>


<div class="panel-error">
Apartado para mostrar errores
<?php echo lang('form_label_equipos');?>
</div>



</div>

<div class="container">

<div class="col-lg-12" style="text-align: right; padding-top: 30px; padding-bottom: 10px;">

<button class="btn boton  boton-azul  btn-ancho120">
<i class="fa fa-save"></i><?php echo lang('form_button_grabar');?>
</button>
<button class="btn boton  boton-azul  btn-ancho120">
<i class="fa fa-trash-o"></i><?php echo lang('form_button_eliminar');?>
</button>
<button class="btn boton  boton-azul  btn-ancho120">
<i class="fa fa-times"></i><?php echo lang('form_button_cancelar');?>
</button>
</div>
</div>
</form>