<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
		<div class="row show-grid ">
			 <div class="col-md-12">
				<div class="input-group">
					<input type="text" id="txt_busqueda" name="busqueda" class="form-control" placeholder="Búsqueda" maxlength="100">
					<div class="input-group-btn">
                    	<button class="btn btn-default" type="button">
                        	<i class="fa fa-search"></i>
                        </button>
                        <a href="<?php echo base_url("jugador/alta");?>" role="button" class="btn btn-info">
    	        			<i class="fa fa-plus"></i>
           	    		</a>
                    </div>   
                </div>
   			 </div>
        </div>
    </div>
    <div class="panel-body collapse in" id="jugador_body" aria-expanded="true">
   		<div class="row">
			<?php echo $jugadores?>
       	</div>
    </div>
</div>
</div>
            
            