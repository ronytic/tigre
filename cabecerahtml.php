<?php
$Nivel=$_SESSION['Nivel'];
$CodUsuarioLog=$_SESSION['CodUsuarioLog'];
include_once("class/usuario.php");
include_once("class/config.php");
$config=new config;
$usuario2=new usuario;
$us2=$usuario2->mostrarDatos($CodUsuarioLog);
$us2=array_shift($us2);
$NombreUsuario=$us2['Nombres'];
$PaternoUsuario=$us2['Paterno'];
$MaternoUsuario=$us2['Materno'];
switch($Nivel){
    case 1:{$NivelUsuario="Administrador";}break;   
    case 2:{$NivelUsuario="Gerente";}break;   
    case 3:{$NivelUsuario="Administrador";}break;   
    case 4:{$NivelUsuario="Secretaria";}break;      
    case 4:{$NivelUsuario="Vendedor";}break;    
}

$Titulo=$config->mostrarConfig("Titulo",1);
$Lema=$config->mostrarConfig("Lema",1);
include_once("class/menu.php");
$menu=new menu;
include_once("class/submenu.php");
$submenu=new submenu;

?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="<?php php_start();?>" />
    <!-- Page title -->
    <title><?php echo $Titulo?></title>
    
    <link rel="shortcut icon" type="image/ico" href="<?php echo $folder?>favicon_1.ico" />

    <!-- Vendor styles -->
    <link rel="stylesheet" href="<?php echo $folder?>css/core/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/metisMenu.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/animate.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/bootstrap/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="<?php echo $folder?>css/core/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/helper.css" />
    <link rel="stylesheet" href="<?php echo $folder?>css/core/style.css">
    <script src="<?php echo $folder?>js/core/jquery.min.js"></script>