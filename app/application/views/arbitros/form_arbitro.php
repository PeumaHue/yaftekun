

<section id="content">
    
      	
 <form id="participante" data-toggle="validator" action="<?php echo $accion; ?>" method="POST">

      	<?php $this->load->view('arbitros/form_hdr_arbitro.php'); ?> 

		<!--//TODO - Investigar para agregar los botones de guadar y eliminar etc  -->
		<!-- BOTON DE ALTA --> 
		<!--  
		<button class="btn btn-float btn-danger m-btn">
			<i class="zmdi zmdi-plus" onclick="<?php echo base_url("arbitro/alta");?>"></i>
		</button>
		-->
					
		<div class="card m-b-0 ">	<!--Es la tarjeta  -->

			<!-- PANEL FORM CARGA -->
	    	<!--  
	    	<div class="panel-body collapse in" id="jugador_body" aria-expanded="true">
	   			<div class="row">
					//<?php echo $html_datos_ppal?>
	       		</div>
	    	</div>
	    	-->
			<!-- FIN PANEL FORM CARGA -->

		</div> 
	</form>
</section>
