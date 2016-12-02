<?php
include_once("../../login/check.php");
$codsubcategoria=$_POST['codsubcategoria'];
include_once("../../class/producto.php");
$producto=new producto;
$pro=$producto->mostrarTodoRegistro("codsubcategoria=".$codsubcategoria);
$s=$_POST['s'];
if($s==1){
?><option value="">Seleccionar</option>
<?php    
}
foreach($pro as $p){?>
<option value="<?php echo $p['codproducto']?>"><?php echo $p['dimension']?></option>
<?php    
}
?>