<section id="content">
 <form id="participante" data-toggle="validator" action="<?php echo $accion; ?>" method="POST">

      	<?php $this->load->view('delegados/busqueda_hdr_delegado.php'); ?> 

		<!--//TODO - Investigar para agregar los botones de guadar y eliminar etc  -->
		<!-- BOTON DE ALTA --> 
		<button class="btn btn-float btn-danger m-btn">
			<i class="zmdi zmdi-plus" onclick="<?php echo base_url("delegado/alta");?>"></i>
		</button>
			
		<div class="card m-b-0 palette-Teal-200 bg text">	<!--Es la tarjeta  -->

			<!-- PANEL DE NOMBRES DE JUGADORES -->
	    	<div class="panel-body collapse in" id="delegado_body" aria-expanded="true">
	   			<div class="row">
					<?php echo $html_datos_ppal?>
	       		</div>
	    	</div>
			<!-- FIN PANEL DE NOMBRE DE DELEGADOS -->

		</div> 
	</form>
</section>