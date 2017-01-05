<?php
include_once("../../login/check.php");
if($_GET['codfactura']!="" || $_GET['Cod']!=""){
include_once("../../class/config.php");
//include_once("../../class/curso.php");
//include_once("../../class/cuota.php");
//include_once("../../class/alumno.php");
include_once("../../class/factura.php");
include_once("../../class/facturadetalle.php");
include_once("../../class/producto.php");
include_once("../../class/categoria.php");
include_once("../../class/subcategoria.php");
$categoria=new categoria;
$subcategoria=new subcategoria;
$producto=new producto;
$factura=new factura;
$facturadetalle=new facturadetalle;
$config=new config;
/*$alumno=new alumno;
$curso=new curso;
$cuota=new cuota;*/
$Logo=$cnf=$config->mostrarConfig("Logo",1);
$Titulo=$config->mostrarConfig("Titulo",1);

$NombreEmpresa=$config->mostrarConfig("NombreEmpresa",1);
$Sucursal=$config->mostrarConfig("Sucursal",1);
$Direccion=$config->mostrarConfig("Direccion",1);
$TelFax=$config->mostrarConfig("TelFax",1);
$Lugar=$config->mostrarConfig("Lugar",1);
$NitEmisor=$config->mostrarConfig("NitEmisor",1);
	$RazonSocialEmisor=$config->mostrarConfig("RazonSocialEmisor",1);
	$SistemaFacturacion=$config->mostrarConfig("SistemaFacturacion",1);
	$ImagenFondoFactura=$config->mostrarConfig("ImagenFondoFactura",1);
	
	$ActividadEconomica=$config->mostrarConfig("ActividadEconomica",1);


$LlaveDosificacion=$config->mostrarConfig("LlaveDosificacion",1);
$ActividadEconomica=$config->mostrarConfig("ActividadEconomica",1);
$ImagenFondoFactura=$config->mostrarConfig("ImagenFondoFactura",1);


$CodFactura=$_GET['codfactura'];
if($CodFactura==""){
    $CodFactura=$_GET['Cod'];
}
$f=$factura->mostrarRegistro($CodFactura);
$f=array_shift($f);
$facd=$facturadetalle->mostrarTodoRegistro("codfactura=".$CodFactura);
$alto=200+(count($facd)*8);
$NumeroAutorizacion=$f['NumeroAutorizacion'];
$FechaLimiteEmision=$f['FechaLimiteEmision'];
$LeyendaPiePagina=$f['LeyendaPiePagina'];
$LeyendaPiePagina2=$f['LeyendaPiePagina2'];
switch($f['Nivel']){
	case "1":{$Usuario=$idioma["Administrador"];}break;	
	case "2":{$Usuario=$idioma["Direccion"];}break;	
}
//define('FPDF_FONTPATH','../fpdf/font/');
include_once("../pdfs.php");

//$pdf=new FPDF("P","mm",array(217,330));
$pdf=new FPDF("P","mm",array(80,$alto));
/*$pdf->AddFont("Tahoma","",'tahoma.php');
$pdf->AddFont("Tahoma","B",'tahomabd.php');*/
$pdf->SetMargins(4,0,4);
$pdf->SetAutoPageBreak(true,0);

$pdf->AddPage();
$pdf->SetFont("Courier","",10);



//!file_exists("../../imagenes/factura/codigos/".$CodFactura.".png")
if(1){
    
	//Si no Existe el Código QR
	$TotalBs=number_format($f['total'],2,".","");
	$TxtCodigoDeControl=$f['CodigoControl'];
	$Nit=$f['nit'];
	$NombreFactura=$f['Factura'];
    $FechaEmision=$f['fechaventa'];
    $TxtCodigoDeControl=$f['TxtCodigoDeControl'];
	/*CódigoQR*/
	
	
	include "../../funciones/phpqrcode/qrlib.php";
	
	$FechaEmision=date("d/m/Y",strtotime($f['fechaventa']));
	$FechaLimiteEmision2=date("d/m/Y",strtotime($FechaLimiteEmision));
	
	$NitEmisor=($NitEmisor!="")?$NitEmisor:'0';
	$RazonSocialEmisor=($RazonSocialEmisor!="")?mayuscula($RazonSocialEmisor):'0';
	$NFactura=($f['NFactura']!="")?$f['NFactura']:'0';
	$NumeroAutorizacion=($NumeroAutorizacion!="")?$NumeroAutorizacion:'0';
	$FechaEmision=($FechaEmision!="")?$FechaEmision:'0';
	$TotalBs=($TotalBs!="")?$TotalBs:'0';
	$TxtCodigoDeControl=($TxtCodigoDeControl!="")?$TxtCodigoDeControl:'0';
	$Nit=($Nit!="")?$Nit:'0';
	$NombreFactura=($NombreFactura!="")?$NombreFactura:'0';

	$TextoCodigoQR=$NitEmisor."|";
	$TextoCodigoQR.=$NFactura."|";
	$TextoCodigoQR.=$NumeroAutorizacion."|";
	$TextoCodigoQR.=$FechaEmision."|";
	$TextoCodigoQR.=$TotalBs."|";
	$TextoCodigoQR.=$TotalBs."|";
	$TextoCodigoQR.=$TxtCodigoDeControl."|";
	$TextoCodigoQR.=$Nit."|";
	$TextoCodigoQR.="0|";
	$TextoCodigoQR.="0|";
    $TextoCodigoQR.="0|";
    $TextoCodigoQR.="0";
	
	$TextoCodigoQR=mayuscula($TextoCodigoQR);
	//echo $TextoCodigoQR;
	
	QRcode::png($TextoCodigoQR,"../../imagenes/factura/codigos/".$CodFactura.".png", 'H', 8, 0);
	/*Fin CódigoQR*/
	//echo "Si";	
}
/*Primera Parte*/

$pdf->SetY(5);
celdaM(72,$NombreEmpresa,"B",11,"C",1);
celda(72,$Sucursal,"",9,"C",1);
$pdf->ln();
celdaM(72,$Direccion,"",9,"C",1);
celdaM(72,$TelFax,"",9,"C",1);
celdaM(72,$Lugar,"",9,"C",1);
celda(72,"FACTURA","B",11,"C",1);
$pdf->ln();
celda(72,"---------------------------------------","",9,"C",1);
$pdf->ln();
celda(72,"NIT: ".$NitEmisor,"",9,"C",1);
$pdf->ln();
celda(72,"Factura No: ".$f['NFactura'],"",9,"C",1);
$pdf->ln();
celda(72,"Autorización No: ".$NumeroAutorizacion,"",9,"C",1);
$pdf->ln();
celda(72,"---------------------------------------","",9,"C",1);
$pdf->ln();
celdaM(72,$ActividadEconomica,"",8,"C",1);
$pdf->ln();
celda(72,"FECHA: ".date("d/m/Y",strtotime($f['fechaventa']))." - ".$f['horaregistro'],"",9,"L",1);
$pdf->ln();
celda(72,"SEÑOR(ES): ".$f['nombre'],"",9,"L",1);

$pdf->ln();
celda(72,"NIT/CI: ".$f['nit'],"",9,"L",1);
$pdf->ln();
celda(72,"---------------------------------------","",9,"C",1);

$pdf->ln();
celda(8,"CANT","",9,"C",1);
celda(38,"CONCEPTO","",9,"C",1);
celda(13,"PRECIO","",9,"C",1);
celda(13,"TOTAL","",9,"C",1);

$pdf->ln();
celda(72,"---------------------------------------","",9,"C",1);
$pdf->ln();
$y=$pdf->getY();
foreach($facd as $fd){$i+=4;
	
        if($fd['codproducto']!=0){
            $pro=$producto->mostrarRegistro($fd['codproducto']);
            $pro=array_shift($pro);
            $c=$categoria->mostrarRegistro($pro['codcategoria']);
            $c=array_shift($c);
            $sc=$subcategoria->mostrarRegistro($pro['codsubcategoria']);
            $sc=array_shift($sc);
        }else{
           $c['nombre'] ="Productos";
           $sc['nombre'] ="Tigre";
           $pro['dimension'] ="";
        }
        
        
        $detalle=$c['nombre'].",".$sc['nombre'].",".$pro['dimension'];
		//$detalle=quitarSimbolos($detalle,false);
			
		$TextoDetalle=capitalizar($detalle);
    $pdf->sety($y);
    celda(8,($fd['cantidad']),"",8,"R");
	celdaM(38,$TextoDetalle,"",8);
    $pdf->setXY(50,$y);
    celda(13,number_format($fd['preciounitario'],2),"",8,"R");
	celda(13,number_format($fd['total'],2),"",8,"R");
    $pdf->ln();
    $y+=8;
}
$pdf->ln();
celda(72,"---------------","",9,"R",1);
$pdf->ln();
celda(59,"TOTAL A PAGAR: Bs.","",9,"R",1);
celda(13,number_format($f['total'],2,".",""),"",8,"R");
$pdf->ln();
celda(59,"TOTAL FACTURA: Bs.","",9,"R",1);
celda(13,number_format($f['total'],2,".",""),"",8,"R");
$pdf->ln();
celda(59,"PAGADO: Bs.","",9,"R",1);
celda(13,number_format($f['pagado'],2,".",""),"",8,"R");
$pdf->ln();
celda(59,"DEVOLUCIÓN: Bs.","",9,"R",1);
celda(13,number_format($f['devolucion'],2,".",""),"",8,"R");
$pdf->ln();
celdaM(72,"SON: ".num2letras(number_format($f['total'],2,".",""))." BOLIVIANOS","",8,"L",1);
celda(72,"CODIGO DE CONTROL: ".($f['TxtCodigoDeControl'])."","",8,"L",1);
$pdf->ln();
celda(72,"FECHA LIMITE DE EMISION: ".date("d/m/Y",strtotime($f['FechaLimiteEmision']))."","",8,"L",1);
$pdf->ln();
$pdf->Image("../../imagenes/factura/codigos/".$CodFactura.".png",$pdf->getX()+23,$pdf->getY()+5,26,26);

$pdf->setY($pdf->getY()+33);
celdaM(72,'"'.$LeyendaPiePagina.'"',"",8,"C",1);
celdaM(72,'"'.$LeyendaPiePagina2.'"',"",7,"C",1);

$TextoCredito='Desarrollado por'." Ronald Nina";
celda(72,"------------".$TextoCredito."------------","",7,"C",0);

if($f['Estado']=="Anulado"){
	$pdf->SetXY(15,90);
	celda(50,"ANULADO","",30,"C");
}
$pdf->Output("Factura.pdf","I");
}
function celda($ancho,$texto,$estilo="B",$tam=10,$ali="",$mayuscula=0){
	global $pdf;
	$pdf->SetFont("Courier",$estilo,$tam);
    if($mayuscula==1){
        $texto=mb_strtoupper($texto,"utf8");
    }
	$pdf->Cell($ancho,4,utf8_decode($texto),0,0,$ali);
}
function celdaM($ancho,$texto,$estilo="B",$tam=10,$ali="",$mayuscula=0){
	global $pdf;
	$pdf->SetFont("Courier",$estilo,$tam);
    if($mayuscula==1){
        $texto=mb_strtoupper($texto,"utf8");
    }
	$pdf->MultiCell($ancho,4,utf8_decode($texto),0,$ali);
}
?>