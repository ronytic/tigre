</head>
<body class="fixed-navbar fixed-sidebar fixed-footer">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Sistema de Administración de Inventario, Ventas y Facturación </h1><p> Sistema Desarrollado por: <a href="http://fb.com/ronaldnina" target="_blank">Ronald Nina</a> </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <div id="logo" class="light-version">
        <span>
            <?php echo $Titulo;?>
        </span>
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary"><small><?php echo $Titulo;?></small></span>
        </div>
        <form role="search" class="navbar-form-custom" method="post" action="">
            <div class="form-group">
                <input type="text" placeholder="" class="form-control" name="search">
            </div>
        </form>
        <div class="mobile-menu">
            <button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
                <i class="fa fa-chevron-down"></i>
            </button>
            <div class="collapse mobile-navbar" id="mobile-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a class="" href="<?php echo $folder?>">Inicio</a>
                    </li>
                    
                    <li>
                        <a class="" href="<?php echo $folder?>usuario/contrasena/">Modificar Contraseña</a>
                    </li>
                    
                    <li>
                        <a class="" href="<?php echo $folder?>login/logout.php">Salir del Sistema</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav no-borders">
                <?php /*<li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="pe-7s-speaker"></i>
                    </a>
                    <ul class="dropdown-menu hdropdown notification animated flipInX">
                        <li>
                            <a>
                                <span class="label label-success">NEW</span> It is a long established.
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="label label-warning">WAR</span> There are many variations.
                            </a>
                        </li>
                        <li>
                            <a>
                                <span class="label label-danger">ERR</span> Contrary to popular belief.
                            </a>
                        </li>
                        <li class="summary"><a href="#">See all notifications</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="pe-7s-keypad"></i>
                    </a>

                    <div class="dropdown-menu hdropdown bigmenu animated flipInX">
                        <table>
                            <tbody>
                            <tr>
                                <td>
                                    <a href="projects.html">
                                        <i class="pe pe-7s-portfolio text-info"></i>
                                        <h5>Projects</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="mailbox.html">
                                        <i class="pe pe-7s-mail text-warning"></i>
                                        <h5>Email</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="contacts.html">
                                        <i class="pe pe-7s-users text-success"></i>
                                        <h5>Contacts</h5>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="forum.html">
                                        <i class="pe pe-7s-comment text-info"></i>
                                        <h5>Forum</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="analytics.html">
                                        <i class="pe pe-7s-graph1 text-danger"></i>
                                        <h5>Analytics</h5>
                                    </a>
                                </td>
                                <td>
                                    <a href="file_manager.html">
                                        <i class="pe pe-7s-box1 text-success"></i>
                                        <h5>Files</h5>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle label-menu-corner" href="#" data-toggle="dropdown">
                        <i class="pe-7s-mail"></i>
                        <span class="label label-success">4</span>
                    </a>
                    <ul class="dropdown-menu hdropdown animated flipInX">
                        <div class="title">
                            You have 4 new messages
                        </div>
                        <li>
                            <a>
                                It is a long established.
                            </a>
                        </li>
                        <li>
                            <a>
                                There are many variations.
                            </a>
                        </li>
                        <li>
                            <a>
                                Lorem Ipsum is simply dummy.
                            </a>
                        </li>
                        <li>
                            <a>
                                Contrary to popular belief.
                            </a>
                        </li>
                        <li class="summary"><a href="#">See All Messages</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="sidebar" class="right-sidebar-toggle">
                        <i class="pe-7s-upload pe-7s-news-paper"></i>
                    </a>
                </li>-->*/?>
                <li class="dropdown">
                    <a href="<?php echo $folder?>login/logout.php" title="Salir del Sistema">
                        <i class="pe-7s-upload pe-rotate-90"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <div class="profile-picture">
            <a href="index-2.html">
                <img src="<?php echo $folder?>imagenes/logo/logo.jpg" class="img-thumbnail  m-b" alt="logo">
            </a>

            <div class="stats-label text-color">
                <div>
                    
                    <small class="text-muted"><?php echo $Lema;?></small>
                </div>
                <span class="font-extra-bold font-uppercase"><?php echo $NombreUsuario;?> <?php echo $PaternoUsuario;?> <?php echo $MaternoUsuario;?> </span>
                <div>
                    
                    <small class="text-muted"><?php echo $NivelUsuario;?></small>
                </div>

                <!--<div class="dropdown">
                    <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <small class="text-muted">Founder of App <b class="caret"></b></small>
                    </a>
                    <ul class="dropdown-menu animated flipInX m-t-xs">
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                        <li><a href="analytics.html">Analytics</a></li>
                        <li class="divider"></li>
                        <li><a href="login/jk">Logout</a></li>
                    </ul>
                </div>-->


                <!--<div id="sparkline1" class="small-chart m-t-sm">s</div>-->
                <!--<div>
                    <h4 class="font-extra-bold m-b-xs">
                        $260 104,200
                    </h4>
                    <small class="text-muted">Your income from the last year in sales product X.</small>
                </div>-->
                
            </div>
        </div>

        <ul class="nav" id="side-menu">
            <li class="active">
                <a href="<?php echo $folder;?>"> <span class="nav-label">Inicio</span> <span class="label label-success pull-right"></span> </a>
            </li>
            <?php foreach($menu->mostrar($Nivel) as $m){
                ?>
                <li>
                    <a href="#"><span class="nav-label"><?php echo $m['Nombre']?></span><span class="fa arrow"></span> </a>
                    <ul class="nav nav-second-level">
                    <?php foreach($submenu->mostrar($Nivel,$m['CodMenu']) as $sm){
                        ?>
                        <li><a href="<?php echo $folder;?><?php echo $m['Url']?><?php echo $sm['Url']?>"><?php echo $sm['Nombre']?></a></li>
                        <?php    
                    }?>
                    </ul>
                </li>
                <?php    
            }?>
        </ul>
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">

    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12 text-center m-t-md">
                <h2>
                    <?php echo $titulo;?>
                </h2>

                <p>
                    <?php echo $subtitulo;?>
                </p>
            </div>
        </div>
        <div class="row">
        <!------------>
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <!--<a class="closebox"><i class="fa fa-times"></i></a>-->
                    </div>
                    <?php echo $titulo2?>
                </div>
                <div class="panel-body">
                    <div class="row">