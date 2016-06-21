<nav class="navbar navbar-inverse">
        <div class="container-fluid panel-torneos">
            <div class="navbar-collapse titulo_gupo" id="myNavbar">
                <h2 class="input-group"><?php echo lang('html_torneo_titulo_default');?></h2>

            </div>
        </div>
    </nav>

    <form id="torneo" data-toggle="validator" action="<?php echo $accion; ?>" method="POST">
        <div class="container ">

            <div class="col-xs-12">
                    <div class="panel panel-default">

                        <div class="panel-heading">
                            <div class="row show-grid ">
                                <div class="col-xs-12 col-sm-4 "><?php echo lang('html_torneo_titulo_default');?></div>
                                <div class="col-xs-8 col-sm-5">
                                    <div class="input-group">
                                        <input type="text" id="txt_busqueda" name="apellido" class="form-control" placeholder="Búsqueda rápida" maxlength="100">                                        
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                                    </div>

                                </div>
                                <div class="col-xs-1">
                                    <a href="<?php echo base_url("torneo/alta");?>" role="button" class="btn btn-primary btn-circle">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="col-xs-3 col-sm-2">
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            <button class="btn btn-default btn-xs dropdown-toggle " type="button" data-toggle="collapse" data-target="#torneo_body">
                                                <i id="flecha_torneo" class="fa fa-chevron-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.panel-heading -->
                        <div id="torneo_body" class="panel-body ">
                            <div class="row">
								<?php echo $torneos?>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>