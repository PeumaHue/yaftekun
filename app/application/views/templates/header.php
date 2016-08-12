<!-- HEADER -->

    <header id="header" class="media">
        <div class="pull-left h-logo">
            <a href="index.php" class="hidden-xs">
                <img class="media-object" src="<?php echo base_url('img/logo_yaftekun.png');?>" alt="">
                <small>Administrador</small>
            </a>

            <div class="menu-collapse" data-ma-action="sidebar-open" data-ma-target="main-menu">
                <div class="mc-wrap">
                    <div class="mcw-line top palette-White bg"></div>
                    <div class="mcw-line center palette-White bg"></div>
                    <div class="mcw-line bottom palette-White bg"></div>
                </div>
            </div>
        </div>

        <ul class="pull-right h-menu">
            <li class="hm-search-trigger">
                <a href="" data-ma-action="search-open">
                    <i class="hm-icon zmdi zmdi-search"></i>
                </a>
            </li>


            <li class="dropdown hidden-xs">
                <a data-toggle="dropdown" href=""><i class="hm-icon zmdi zmdi-more-vert"></i></a>
                <ul class="dropdown-menu dm-icon pull-right">
                    <li class="hidden-xs">
                        <a data-action="fullscreen" href=""><i class="zmdi zmdi-fullscreen"></i>Pantalla completa</a>
                    </li>
                    <li>
                        <a data-action="clear-localstorage" href=""><i class="zmdi zmdi-delete"></i>Eliminar cache</a>
                    </li>
                    <li>
                        <a href=""><i class="zmdi zmdi-settings"></i>Configuraciones</a>
                    </li>
                </ul>
            </li>
            <li class="hm-alerts" data-user-alert="sua-messages" data-ma-action="sidebar-open" data-ma-target="user-alerts">
                <a href=""><i class="hm-icon zmdi zmdi-notifications"></i></a>
            </li>
            <li class="dropdown hm-profile">
                <a data-toggle="dropdown" href="">
                    <img src="img/profile-pics/1.jpg" alt="">
                </a>

                <ul class="dropdown-menu pull-right dm-icon">
                    <li>
                        <a href="profile-about.html"><i class="zmdi zmdi-account"></i>Ver Perfil</a>
                    </li>
                    <li>
                        <a href=""><i class="zmdi zmdi-settings"></i>Configuraciones</a>
                    </li>
                    <li>
                        <a href=""><i class="zmdi zmdi-time-restore"></i>Salir</a>
                    </li>
                </ul>
            </li>
        </ul>

        <div class="media-body h-search">
            <form class="p-relative">
                <input type="text" class="hs-input" placeholder="Buscar personas, equipos y torneos">
                <i class="zmdi zmdi-search hs-reset" data-ma-action="search-clear"></i>
            </form>
        </div>

    </header>

<!-- END HEADER -->    