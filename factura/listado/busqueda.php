<?php
include_once("../../login/check.php");
extract($_POST);
include_once("../../class/factura.php");
$factura=new factura;
$fact=$factura->mostrarTodoRegistro("fechaventa BETWEEN '$FechaDesde' and '$FechaHasta' and Estado LIKE '$Estado' and nit LIKE '$Nit%'",1,"fechaventa,Nfactura,nit,nombre,total");
?>
<table class="table table-bordered table-striped table-hover">
<thead>
    <tr>
        <th>N</th>
        <th>Factura A</th>
        <th>Nit</th>
        <th>Fecha de Factura</th>
        <th>Nº Factura</th>
        <th>Total</th>
        <th>Pagado</th>
        <th>Cambio</th>
        <th>Estado</th>
        <th></th>
    </tr>
</thead>

<?php
$i=0;
$totalt=0;
$totalpagado=0;
$totalcambio=0;
foreach($fact as $f){$i++;
    $datos[$i]['codfactura']=$f['codfactura'];
    $datos[$i]['fechaventa']=date("d/m/Y",strtotime($f['fechaventa']));
    $datos[$i]['nombre']=$f['nombre'];
    $datos[$i]['nit']=$f['nit'];
    $datos[$i]['total']=$f['total'];
    $datos[$i]['pagado']=$f['pagado'];
    $datos[$i]['devolucion']=$f['devolucion'];
    $datos[$i]['NFactura']=$f['NFactura'];
    $datos[$i]['Estado']=$f['Estado'];
    $totalt+=$f['total'];
    $totalpagado+=$f['pagado'];
    $totalcambio+=$f['devolucion'];
  ?>
  <tr class="<?php echo $f['Estado']=="Anulado"?'danger"':''?>">
    <td><?php echo $i;?></td>
    <td><?php echo $f['nombre']?></td>
    <td><?php echo $f['nit']?></td>
    <td><?php echo date("d/m/Y",strtotime($f['fechaventa']))?></td>
    <td><?php echo $f['NFactura']?></td>
    <td class="text-right"><?php echo number_format($f['total'],2,".","")?></td>
    <td class="text-right"><?php echo number_format($f['pagado'],2,".","")?></td>
    <td class="text-right"><?php echo number_format($f['devolucion'],2,".","")?></td>
    <td>
        <select name="Estado" class="form-control Estado" rel="<?php echo $f['codfactura']?>">
                <option value="Valido" <?php echo $f['Estado']=="Valido"?'selected="selected"':''?>>Valido</option>
                <option value="Anulado" <?php echo $f['Estado']=="Anulado"?'selected="selected"':''?>>Anulado</option>
                </select>
    
    </td>
    <td><a href="../../impresion/factura/facturaticket.php?codfactura=<?php echo $f['codfactura']?>" target="_blank" class="btn btn-info">Ver Factura</a></td>
  </tr>
  <?php
    
}
//listadotabla(array("nombre"=>"Factura A","nit"=>"Nit","fechaventa"=>"Fecha de Factura","NFactura"=>"Nº Factura","total"=>"Total","pagado"=>""),$datos,1,"","","",array("../../impresion/factura/facturaticket.php"=>"Ver Factura"),"","_blank");
?>
<tfoot>
    <tr>
        <th colspan="5" class="text-right"><strong>Total</strong></th>
        <th class="text-right"><?php echo number_format($totalt,2,".","")?></th>
        <th class="text-right"><?php echo number_format($totalpagado,2,".","")?></th>
        <th class="text-right"><?php echo number_format($totalcambio,2,".","")?></th>
    </tr>
</tfoot>
</table>