<?php
include_once("../class/config.php");
$config=new config;
$titulo=$config->mostrarConfig("Titulo",1);
$Lema=$config->mostrarConfig("Lema",1);
$folder="../";
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title><?php echo $titulo?></title>

    <link rel="shortcut icon" type="image/ico" href="../favicon_1.ico" />

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo $folder?>css/core/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/animate.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/bootstrap/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo $folder?>css/core/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/helper.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/style.css">

</head>
<body class="blank">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div class="color-line"></div>



<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3><?php echo $titulo?></h3>
                <small><?php echo $Lema?></small>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                        <?php if(isset($_GET['error'])){?>
                        <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <small>Los datos Introducidos son erroneos.</small>
                        </div>
                        <?php }?>
                        <?php if(isset($_GET['incompleto'])){?>
                        <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <small>Los datos Introducidos estan incompletos.</small>
                        </div>
                        <?php }?>
                        <form action="login.php" id="loginForm" method="post">
                        <input type="hidden" name="u" value="<?php echo $_GET['u'];?>" />
                            <div class="form-group">
                                <label class="control-label" for="username">Usuario</label>
                                <input type="text" placeholder="Introduce tu usuario" title="Introduce tu usuario" required="" value="" name="usuario" id="usuario" class="form-control" autofocus>
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Contraseña</label>
                                <input type="password" title="Introduce tu contraseña" placeholder="******" required="" value="" name="pass" id="pass" class="form-control">
                                
                            </div>

                            <button class="btn btn-success btn-block">Ingresar</button>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <strong>&copy; Todos los Derechos Reservadors <?php echo date("Y");?><br> Sistema Realizado por <a href="http://fb.com/ronaldnina/" target="_blank">Ronald Nina Layme</a></strong> 
        </div>
    </div>
</div>


<!-- Vendor scripts -->
<script src="<?php echo $folder?>js/core/jquery.min.js"></script>
<script src="<?php echo $folder?>js/core/jquery-ui.min.js"></script>
<script src="<?php echo $folder?>js/core/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $folder?>js/core/bootstrap.min.js"></script>
<script src="<?php echo $folder?>js/core/metisMenu/metisMenu.min.js"></script>
<script src="<?php echo $folder?>js/core/icheck.min.js"></script>
<script src="<?php echo $folder?>js/core/sparkline/index.js"></script>

<!-- App scripts -->
<script src="<?php echo $folder?>js/core/homer.js"></script>
<script src="js/login.js"></script>

</body>


</html>