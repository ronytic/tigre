<?php
include_once("../../login/check.php");
$titulo="Registro de Venta";
$folder="../../";
$titulo2="";
include_once("../../class/sucursal.php");
$sucursal=new sucursal;
$suc=$sucursal->mostrarTodoRegistro("",1,"nombre");

include_once("../../class/categoria.php");
$categoria=new categoria;
$cat=$categoria->mostrarTodoRegistro("",1,"nombre");



include_once("../../class/factura.php");
$factura=new factura;


include_once("../../cabecerahtml.php");

$NumeroAutorizacion=$config->mostrarConfig("NumeroAutorizacion",1);
$FechaLimiteEmision=$config->mostrarConfig("FechaLimiteEmision",1);
//echo $NumeroAutorizacion;
$f=$factura->ObtenerNFactura($NumeroAutorizacion);
$f=array_shift($f);
$NFactura=$f['NFacturaActual'];
?>
<style type="text/css">
.btnc{
    width:100px;
    height:100px !important;
    margin-bottom:5px;    
}
</style>
<script language="javascript" type="text/javascript">
$(document).on("ready",function(){
    $(".btnc").click(function(e) {
        e.preventDefault();
        var codcategoria=$(this).attr("rel");
        //alert(codcategoria);
        $.post("verproductos.php",{'codcategoria':codcategoria},function(data){
            $("#cuadroproductos").html(data).slideDown();
            //alert(data);
            $("#cuadrocategoria").slideUp();
        }); 
    });
    $("#categoria").click(function(e) {
        e.preventDefault();
        $("#cuadrocategoria").slideDown();
        $("#cuadroproductos").slideUp();
    });
    $("#productos").click(function(e) {
        e.preventDefault();
        $("#cuadrocategoria").slideUp();
        $("#cuadroproductos").slideDown();
    });
    var l=1;
    $(document).on("click",".adicionar",function(e){
         e.preventDefault();
        var codproducto=$(this).attr("rel");
        var codsucursal=$("#codsucursal").val();
        var tipo=$("#tipo").val();
        $.post("adicionar.php",{"codproducto":codproducto,"codsucursal":codsucursal,"tipo":tipo,"l":l},function(data){
           $("#marca").before(data);
           l++;
        });
        
    });
    $(document).on("click","#otro",function(e){
         e.preventDefault();
        var codproducto=0;
        var codsucursal=$("#codsucursal").val();
        var tipo=$("#tipo").val();
        $.post("adicionar.php",{"codproducto":codproducto,"codsucursal":codsucursal,"tipo":tipo,"l":l},function(data){
           $("#marca").before(data);
           l++;
        });
        
    });
    $(document).on("click",".eliminar",function(e){
         e.preventDefault();
        $(this).parent().parent().remove();
        sumar();
        
    });
    $(document).on("click",".cantidad,.pu",function(e){
        $(this).select();
    });
     $(document).on("change",".cantidad",function(e){
         e.preventDefault();
        var lin=$(this).attr("rel");
        var pu=parseFloat($(".preciounitario"+lin).val());
        var cantidad=parseFloat($(this).val())
        var total=cantidad*pu;
        $(".total[rel="+lin+"]").val(total.toFixed(2))
        sumar();
        
    });
    $(document).on("keyup",".pu",function(e){
         e.preventDefault();
        var lin=$(this).attr("rel");
        var pu=parseFloat($(".preciounitario"+lin).val());
        var cantidad=parseFloat($(".cantidad[rel="+lin+"]").val())
        var total=cantidad*pu;
        $(".total[rel="+lin+"]").val(total.toFixed(2))
        sumar();
        
    });
    $(document).on("keyup","#pagado",function(){
        var tt=parseFloat($("#totalt").val());
        var pa=parseFloat($("#pagado").val());
        var cam=pa-tt;
        $("#devolucion").val(cam.toFixed(2));
    });
    $(document).on("submit","#formregistro",function(e){
        if(!confirm("¿Esta Seguro de Realizar esta Venta?")){
            e.preventDefault();
            e.stopPropagation();
            return false;
        }
    });
    //verventas();
})
function sumar(){
    var to=0;
    $(".total").each(function(index, element) {
        var v=parseFloat($(this).val());
        to=to+v;
    });
    $("#totalt").val(to.toFixed(2));
}
function verventas(){
    $.post("verventas.php",{},function(data){
        //$("#ventas").html(data);   
    });    
}
</script>
<?php include_once("../../cabecera.php");?>
        <div class="col-lg-7">
            <div class="hpanel">
                <div class=" panel-heading">Detalle de Productos <a href="#" class="btn btn-xs btn-warning" id="categoria">Categoria</a><a href="#" class="btn btn-xs btn-warning" id="productos">Productos</a><table>
                        <tr>
                            <td>Sucursal:</td><td><select name="codsucursal" id="codsucursal" class="form-control">
                                    <?php foreach($suc as $s){?>
                                    <option value="<?php echo $s['codsucursal']?>"><?php echo $s['nombre']?></option>
                                    <?php }?>
                                </select></td>
                            <td> Tipo: </td><td><select name="tipo" id="tipo" class="form-control"><option value="cf">Con Factura</option><option value="sf">Sin Factura</option></select></td>
                            <td><a href="#" class="btn btn-success" id="otro">Otro Producto</a></td>
                        </tr>
                    </table>
                
                                
                </div>
                <div class=" panel-body" id="cuadrocategoria">
                    <?php
                        foreach($cat as $c){
                        ?>
                        <a href="" class="btn btn-info btn-md bcodcategoria btnc"  rel="<?php echo $c['codcategoria']?>" title="<?php echo $c['descripcion']?>"><img src="../../imagenes/categoria/<?php echo $c['imagen']?>" width="75" height="65"><br><?php echo $c['nombre']?></a>
                        <!--<a href="" class="btn btn-info btn-md bcodcategoria btnc" rel="<?php echo $c['codcategoria']?>"><?php echo $c['nombre']?></a>
                        <a href="" class="btn btn-info btn-md bcodcategoria btnc" rel="<?php echo $c['codcategoria']?>"><?php echo $c['nombre']?></a>
                        <a href="" class="btn btn-info btn-md bcodcategoria btnc" rel="<?php echo $c['codcategoria']?>"><?php echo $c['nombre']?></a>
                        <a href="" class="btn btn-info btn-md bcodcategoria btnc" rel="<?php echo $c['codcategoria']?>"><?php echo $c['nombre']?></a>-->
                        <?php    
                        }
                    ?>
                </div>
                <div class=" panel-body" id="cuadroproductos">
                    
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="hpanel">
                <div class=" panel-heading">Ventas</div>
                <div class=" panel-body">
                <strong>Fecha Limite de Emisión: </strong><span class="badge"><?php echo date("d-m-Y",strtotime($FechaLimiteEmision))?></span>
                <form action="guardar.php" method="post" id="formregistro">
                    <table>
                        <tr>
                            <td><strong>Nombre:</strong><br><input type="text" name="nombre" class="form-control"></td>
                            <td><strong>Nit:</strong><br><input type="text" name="nit" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td><strong>Fecha:</strong><br><input type="date" name="fecha" class="form-control" value="<?php echo date("Y-m-d");?>" required></td>
                            <td><strong>Nº Factura:</strong><br><input type="number" name="NFactura" class="form-control text-right" value="<?php echo $NFactura;?>" required min="0" step="1"></td>
                            </td>
                        </tr>
                    </table>
                    
                    <table class="table table-bordered table-striped table-condensed table-hover">
                    <thead>
                        <tr>
                            <th>N</th>
                            <th>Item</th>
                            <th>Cant</th>
                            <th>P/U</th>
                            <!--<th>C/F</th>
                            <th>S/F</th>-->
                            <th width="90">Total</th>
                            
                        </tr>
                        <tr id="marca">
                            <td colspan="4" class="text-right">Total:</td>
                            
                            <td><input type="text" readonly class="form-control text-right" id="totalt" name="totalt" value="0"  ></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Cancelado:</td>
                            
                            <td><input type="text" class="form-control text-right" id="pagado" name="pagado" value="0"  required></td>
                        </tr>
                        <tr>
                            <td colspan="4" class="text-right">Cambio:</td>
                            
                            <td><input type="text" readonly class="form-control text-right" id="devolucion" name="devolucion" value="0" ></td>
                        </tr>
                    </thead>
                    </table>
                    <input type="submit" value="Venta Contado" class="btn btn-info">
                    <input type="button" value="Venta Pago Pendiente" class="btn btn-danger">
                    </form>
                    
                </div>
            </div>
        </div>
   
<?php include_once("../../pie.php");?>