<?php
include_once("../../login/check.php");
$codcategoria=$_POST['codcategoria'];
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
$subcat=$subcategoria->mostrarTodoRegistro("codcategoria=".$codcategoria);
$s=$_POST['s'];
if($s==1){
?><option value="">Seleccionar</option>
<?php    
}
foreach($subcat as $sc){?>
<option value="<?php echo $sc['codsubcategoria']?>"><?php echo $sc['nombre']?></option>
<?php    
}
?>