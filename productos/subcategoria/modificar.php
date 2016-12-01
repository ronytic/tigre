<?php
include_once("../../login/check.php");
$folder="../../";
$titulo="Modificar Categoria";
$Cod=$_GET['Cod'];
include_once("../../class/categoria.php");
$categoria=new categoria;
$cat=todoLista($categoria->mostrarTodoRegistro("",1,"nombre"),"codcategoria","nombre");
include_once("../../class/subcategoria.php");
$subcategoria=new subcategoria;
$subcat=$subcategoria->mostrarRegistro($Cod);
$subcat=array_shift($subcat);
include_once("../../cabecerahtml.php");
?>
<?php include_once("../../cabecera.php");?>
<div class="col-lg-12">
    <form action="actualizar.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="cod" value="<?php echo $Cod;?>">
    <table class="table table-bordered table-hover">
        <tr>
            <td class="text-right">Categoria</td>
            <td><?php campo("codcategoria","select",$cat,"form-control",1,"",0,"",$subcat['codcategoria'])?></td>
        </tr>
        <tr>
            <td class="text-right">Nombre de la Categoria</td>
            <td><input type="text" name="nombre" class="form-control" autofocus value="<?php echo $subcat['nombre']?>"></td>
        </tr>
        <tr>
            <td class="text-right">Descripción de la Categoria</td>
            <td><textarea name="descripcion" class="form-control"><?php echo $subcat['descripcion']?></textarea></td>
        </tr>
        <tr>
            <td class="text-right">Imágen de la Categoria</td>
            <td><input name="imagen" class="form-control" type="file" accept="image/*">
                <?php if($subcat['imagen']!=""){
                ?>
                <img src="../../imagenes/subcategoria/<?php echo $subcat['imagen']?>" class="img-thumbnail" width="300">
                <?php }?>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Guardar" class="btn btn-info"></td>
        </tr>
    </table>
    </form>
</div>
<?php include_once("../../pie.php");?>