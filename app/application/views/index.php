

    <div class="container">

        <div class="row col-lg-4 col-md-4 ">

            <div class="panel panel-torneos">
                <div class="panel-heading"><?php echo lang('form_label_torneos');?></div>
                <div class="panel-body">
   					<?php echo $torneos;?>
                </div>
                <!-- /.panel-body -->
            </div>

        </div>

        <div class="row col-lg-8 col-md-8">
            <!--TORNEOS-->

            <div class="col-lg-6 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div id="pnl_Torneos" class="row">
                            <a href="torneo.html">
                                <span class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </span>
                                <span class="col-xs-9 text-right">
                                    <span class="huge">8</span><br>
                                    <span><?php echo lang('form_label_torneos');?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!--EQUIPOS-->
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-equipos">
                    <div class="panel-heading">
                        <div class="row">
                            <a href="<?php echo site_url('equipo'); ?>">
                                <span class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </span>
                                <span class="col-xs-9 text-right">
                                    <span class="huge">8</span><br>
                                    <span><?php echo lang('form_label_equipos');?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

            <!--JUGADORES-->
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-jugadores">
                    <div class="panel-heading">
                        <div class="row">
                            <a href="<?php echo site_url('jugador'); ?>">
                                <span class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </span>
                                <span class="col-xs-9 text-right">
                                    <span class="huge">265</span><br>
                                    <span><?php echo lang('form_label_jugadores');?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <!--DIRECTORES TECNICOS-->
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-directores">
                    <div class="panel-heading">
                        <div class="row">
                            <a href="<?php echo site_url('director_tecnico'); ?>">
                                <span class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </span>
                                <span class="col-xs-9 text-right">
                                    <span class="huge">22</span><br>
                                    <span><?php echo lang('form_label_directores_tecnicos');?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--ARBITROS-->
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-arbitros">
                    <div class="panel-heading">
                        <div class="row">
                            <a href="<?php echo site_url('arbitro'); ?>">
                                <span class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </span>
                                <span class="col-xs-9 text-right">
                                    <span class="huge">22</span><br>
                                    <span><?php echo lang('form_label_arbitros');?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--DELEGADOS-->
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-delegados">
                    <div class="panel-heading">
                        <div class="row">
                            <a href="<?php echo site_url('delegado'); ?>">
                                <span class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </span>
                                <span class="col-xs-9 text-right">
                                    <span class="huge">22</span><br>
                                    <span><?php echo lang('form_label_delegados');?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>
