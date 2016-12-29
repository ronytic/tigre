<?php
include_once("../../login/check.php");
if($_GET['codfactura']!=""){
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

$LlaveDosificacion=$config->mostrarConfig("LlaveDosificacion",1);
$ActividadEconomica=$config->mostrarConfig("ActividadEconomica",1);
$LeyendaPiePagina=$config->mostrarConfig("LeyendaPiePagina",1);
$ImagenFondoFactura=$config->mostrarConfig("ImagenFondoFactura",1);
$CodFactura=$_GET['codfactura'];
$f=$factura->mostrarRegistro($CodFactura);
$f=array_shift($f);
$NumeroAutorizacion=$f['NumeroAutorizacion'];
$FechaLimiteEmision=$f['FechaLimiteEmision'];
switch($f['Nivel']){
	case "1":{$Usuario=$idioma["Administrador"];}break;	
	case "2":{$Usuario=$idioma["Direccion"];}break;	
}
define('FPDF_FONTPATH','../fpdf/font/');
include_once("../pdfs.php");

$pdf=new FPDF("P","mm",array(217,330));
$pdf->AddFont("Tahoma","",'tahoma.php');
$pdf->AddFont("Tahoma","B",'tahomabd.php');

$pdf->SetAutoPageBreak(true,0);

$pdf->AddPage();
$pdf->SetFont("Tahoma","",10);
if($ImagenFondoFactura==1){
//$pdf->Image("../../imagenes/factura/factura.jpg",0,0,217,330);
$pdf->Image("../../imagenes/factura/factura2016qr.jpg",0,-4,217,330);
}
if(!file_exists("../../imagenes/factura/codigos/".$CodFactura.".png")){
	//Si no Existe el Código QR
	$TotalBs=number_format($f['TotalBs'],2);
	$TxtCodigoDeControl=$f['CodigoControl'];
	$Nit=$f['Nit'];
	$NombreFactura=$f['Factura'];
	/*CódigoQR*/
	$NitEmisor=$config->mostrarConfig("NitEmisor",1);
	$RazonSocialEmisor=$config->mostrarConfig("RazonSocialEmisor",1);
	$SistemaFacturacion=$config->mostrarConfig("SistemaFacturacion",1);
	$ImagenFondoFactura=$config->mostrarConfig("ImagenFondoFactura",1);
	
	$ActividadEconomica=$config->mostrarConfig("ActividadEconomica",1);
	$LeyendaPiePagina=$config->mostrarConfig("LeyendaPiePagina",1);
	
	include "../../funciones/phpqrcode/qrlib.php";
	
	$FechaEmision=date("d/m/Y",strtotime($f['FechaFactura']));
	$FechaLimiteEmision2=date("d/m/Y",strtotime($FechaLimiteEmision));
	
	$NitEmisor=($NitEmisor!="")?$NitEmisor:'0';
	$RazonSocialEmisor=($RazonSocialEmisor!="")?mayuscula($RazonSocialEmisor):'0';
	$NFactura=($f['NFactura']!="")?$f['NFactura']:'0';
	$NumeroAutorizacion=($NumeroAutorizacion!="")?$NumeroAutorizacion:'0';
	$FechaEmision=($FechaEmision!="")?$FechaEmision:'0';
	$TotalBs=($TotalBs!="")?$TotalBs:'0';
	$TxtCodigoDeControl=($TxtCodigoDeControl!="")?$TxtCodigoDeControl:'0';
	$FechaLimiteEmision2=($FechaLimiteEmision2!="")?$FechaLimiteEmision2:'0';
	$Nit=($Nit!="")?$Nit:'0';
	$NombreFactura=($NombreFactura!="")?$NombreFactura:'0';

	$TextoCodigoQR=$NitEmisor."|";
	$TextoCodigoQR.=$RazonSocialEmisor."|";
	$TextoCodigoQR.=$NFactura."|";
	$TextoCodigoQR.=$NumeroAutorizacion."|";
	$TextoCodigoQR.=$FechaEmision."|";
	$TextoCodigoQR.=$TotalBs."|";
	$TextoCodigoQR.=$TxtCodigoDeControl."|";
	$TextoCodigoQR.=$FechaLimiteEmision2."|";
	$TextoCodigoQR.=$Nit."|";
	$TextoCodigoQR.=$NombreFactura;
	
	$TextoCodigoQR=mayuscula($TextoCodigoQR);
	//echo $TextoCodigoQR;
	
	QRcode::png($TextoCodigoQR,"../../imagenes/factura/codigos/".$CodFactura.".png", 'H', 8, 0);
	/*Fin CódigoQR*/
	//echo "Si";	
}
/*Primera Parte*/
$x=-4+$_GET['x'];
$y=15+$_GET['y'];


/*Borde*/
/*
$pdf->SetXY($x+125,$y-5);
$pdf->Cell(80,20,"",1);
$pdf->SetXY($x+15,$y+18);
$pdf->Cell(190,8,"",1);
$pdf->SetXY($x+15,$y+28);
$pdf->Cell(130,40,"",1);
$pdf->SetXY($x+145,$y+28);
$pdf->Cell(60,40,"",1);
$pdf->SetXY($x+15,$y+69);
$pdf->Cell(190,15,"",1);*/

$Credito=1;
$TextoCredito='Desarrollado Por'." Ronald Nina";

$pdf->SetXY($x+155,$y);
celda(27,'Nº de Autorización'.": ","B",9);
celda(40,$NumeroAutorizacion,"",8);
$pdf->Ln();
$pdf->SetXY($x+155,$y+5);
celda(35,'Nº Factura'.": ","B",8);
celda(40,$f['codfactura'],"",8);

$pdf->SetXY($x+20,$y+22);
celda(20,'Señores'.": ","B");
celda(65,mayuscula($f['nombre']),"");
celda(15,'Nit'.": ","B");
celda(30,($f['nit']),"");
celda(15,'Fecha'.": ","B");
celda(40,strftime("%d de %B de %Y",strtotime($f['fechaventa'])),"");

if($f['Estado']=="Anulado"){
	$pdf->SetXY($x+55,$y+50);
	celda(50,"ANULADO","",26,"C");
}
$pdf->SetXY($x+15,$y+30);
//celda(130,$idioma['DetalleFacturacion'],"B",11,"C");
//celda(60,$idioma['Sello'],"B",11,"C");
$i=$y+35;
foreach($facturadetalle->mostrarTodoRegistro("codfactura=".$CodFactura) as $fd){$i+=4;
	$pdf->SetXY($x+25,$i);	
		$pro=$producto->mostrarRegistro($fd['codproducto']);
        $pro=array_shift($pro);
        $c=$categoria->mostrarRegistro($pro['codcategoria']);
        $c=array_shift($c);
       
        $sc=$subcategoria->mostrarRegistro($pro['codsubcategoria']);
        $sc=array_shift($sc);
        $detalle=$c['nombre'].",".$sc['nombre'].",".$pro['dimension'];
		//$detalle=quitarSimbolos($detalle,false);
			
		$TextoDetalle=capitalizar($detalle);

	celda(115,$TextoDetalle,"","9");
	celda(35,number_format($fd['total'],2),"",10,"R");
}
$pdf->SetXY($x+20,$y+55);
celda(10,'Son'.": ","B");
celda(110,mayuscula(num2letras($f['total']))." ".'Bolivianos',"","8");
celda(15,'Total'.": ","B","8");
celda(20,number_format($f['total'],2),"",10,"R");
/*$pdf->SetXY($x+177,$y+55);
celda(12,$idioma['Cajero'].": ","B","8");
celda(20,$Usuario,"",8,"");*/
$pdf->Ln();
$pdf->SetXY($x+140,$y+59);
celda(15,'Cancelado'.": ","B","8");
celda(20,number_format($f['pagado'],2),"",10,"R");

$pdf->SetXY($x+20,$y+63);
celda(37,'Fecha Límite de Emisión'.": ","B","8");
celda(15,fecha2Str($FechaLimiteEmision),"",8,"R");
if($Credito){
	$pdf->SetXY($x+100,$y+63);
	celda(35,$TextoCredito,"","6");
}

$pdf->SetXY($x+20,$y+59);
celda(30,'Codigo de Control'.": ","B","8");
celda(55,$f['codigocontrol'],"",8,"");
$pdf->SetXY($x+140,$y+63);
celda(15,'Cambio'.": ","B","8");
celda(20,number_format($f['devolucion'],2),"",10,"R");

$pdf->SetXY($x+177,$y+59);
celda(22,'NTransaccion'.": ","B","8");
celda(10,(($f['codfactura'])),"","8");

$pdf->SetXY($x+177,$y+63);
celda(10,'Hora'.": ","B","8");
celda(15,(($f['horaregistro'])),"","8");


$pdf->SetXY($x+47,$y+78);
celda(10,'"'.mayuscula($LeyendaPiePagina).'"',"B","8");

$pdf->SetXY($x+130,$y+13);
celda(10,'Actividad Económica'.": ".capitalizar($ActividadEconomica),"B","8");


$pdf->Image("../../imagenes/factura/codigos/".$CodFactura.".png",$x+22,$y+72,17,17);

/*Segunda Parte*/
$y=120;
$pdf->SetXY($x+155,$y);
celda(27,'Nº de Autorización'.": ","B",9);
celda(40,$NumeroAutorizacion,"",8);
$pdf->Ln();
$pdf->SetXY($x+155,$y+5);
celda(35,'Nº Factura'.": ","B",8);
celda(40,$f['codfactura'],"",8);

$pdf->SetXY($x+20,$y+22);
celda(20,'Señores'.": ","B");
celda(65,mayuscula($f['nombre']),"");
celda(15,'Nit'.": ","B");
celda(30,($f['nit']),"");
celda(15,'Fecha'.": ","B");
celda(40,strftime("%d de %B de %Y",strtotime($f['fechaventa'])),"");

if($f['Estado']=="Anulado"){
	$pdf->SetXY($x+55,$y+50);
	celda(50,"ANULADO","",26,"C");
}
$pdf->SetXY($x+15,$y+30);
//celda(130,$idioma['DetalleFacturacion'],"B",11,"C");
//celda(60,$idioma['Sello'],"B",11,"C");
$i=$y+35;
foreach($facturadetalle->mostrarTodoRegistro("codfactura=".$CodFactura) as $fd){$i+=4;
	$pdf->SetXY($x+25,$i);	
		$pro=$producto->mostrarRegistro($fd['codproducto']);
        $pro=array_shift($pro);
        $c=$categoria->mostrarRegistro($pro['codcategoria']);
        $c=array_shift($c);
       
        $sc=$subcategoria->mostrarRegistro($pro['codsubcategoria']);
        $sc=array_shift($sc);
        $detalle=$c['nombre'].",".$sc['nombre'].",".$pro['dimension'];
		//$detalle=quitarSimbolos($detalle,false);
			
		$TextoDetalle=capitalizar($detalle);

	celda(115,$TextoDetalle,"","9");
	celda(35,number_format($fd['total'],2),"",10,"R");
}
$pdf->SetXY($x+20,$y+55);
celda(10,'Son'.": ","B");
celda(110,mayuscula(num2letras($f['total']))." ".'Bolivianos',"","8");
celda(15,'Total'.": ","B","8");
celda(20,number_format($f['total'],2),"",10,"R");
/*$pdf->SetXY($x+177,$y+55);
celda(12,$idioma['Cajero'].": ","B","8");
celda(20,$Usuario,"",8,"");*/
$pdf->Ln();
$pdf->SetXY($x+140,$y+59);
celda(15,'Cancelado'.": ","B","8");
celda(20,number_format($f['pagado'],2),"",10,"R");

$pdf->SetXY($x+20,$y+63);
celda(37,'Fecha Límite de Emisión'.": ","B","8");
celda(15,fecha2Str($FechaLimiteEmision),"",8,"R");
if($Credito){
	$pdf->SetXY($x+100,$y+63);
	celda(35,$TextoCredito,"","6");
}

$pdf->SetXY($x+20,$y+59);
celda(30,'Codigo de Control'.": ","B","8");
celda(55,$f['codigocontrol'],"",8,"");
$pdf->SetXY($x+140,$y+63);
celda(15,'Cambio'.": ","B","8");
celda(20,number_format($f['devolucion'],2),"",10,"R");

$pdf->SetXY($x+177,$y+59);
celda(22,'NTransaccion'.": ","B","8");
celda(10,(($f['codfactura'])),"","8");

$pdf->SetXY($x+177,$y+63);
celda(10,'Hora'.": ","B","8");
celda(15,(($f['horaregistro'])),"","8");


$pdf->SetXY($x+47,$y+78);
celda(10,'"'.mayuscula($LeyendaPiePagina).'"',"B","8");

$pdf->SetXY($x+130,$y+13);
celda(10,'Actividad Económica'.": ".capitalizar($ActividadEconomica),"B","8");


$pdf->Image("../../imagenes/factura/codigos/".$CodFactura.".png",$x+22,$y+72,17,17);



/*Tercera Parte*/
$y=229;
$pdf->SetXY($x+155,$y);
celda(27,'Nº de Autorización'.": ","B",9);
celda(40,$NumeroAutorizacion,"",8);
$pdf->Ln();
$pdf->SetXY($x+155,$y+5);
celda(35,'Nº Factura'.": ","B",8);
celda(40,$f['codfactura'],"",8);

$pdf->SetXY($x+20,$y+22);
celda(20,'Señores'.": ","B");
celda(65,mayuscula($f['nombre']),"");
celda(15,'Nit'.": ","B");
celda(30,($f['nit']),"");
celda(15,'Fecha'.": ","B");
celda(40,strftime("%d de %B de %Y",strtotime($f['fechaventa'])),"");

if($f['Estado']=="Anulado"){
	$pdf->SetXY($x+55,$y+50);
	celda(50,"ANULADO","",26,"C");
}
$pdf->SetXY($x+15,$y+30);
//celda(130,$idioma['DetalleFacturacion'],"B",11,"C");
//celda(60,$idioma['Sello'],"B",11,"C");
$i=$y+35;
foreach($facturadetalle->mostrarTodoRegistro("codfactura=".$CodFactura) as $fd){$i+=4;
	$pdf->SetXY($x+25,$i);	
		$pro=$producto->mostrarRegistro($fd['codproducto']);
        $pro=array_shift($pro);
        $c=$categoria->mostrarRegistro($pro['codcategoria']);
        $c=array_shift($c);
       
        $sc=$subcategoria->mostrarRegistro($pro['codsubcategoria']);
        $sc=array_shift($sc);
        $detalle=$c['nombre'].",".$sc['nombre'].",".$pro['dimension'];
		//$detalle=quitarSimbolos($detalle,false);
			
		$TextoDetalle=capitalizar($detalle);

	celda(115,$TextoDetalle,"","9");
	celda(35,number_format($fd['total'],2),"",10,"R");
}
$pdf->SetXY($x+20,$y+55);
celda(10,'Son'.": ","B");
celda(110,mayuscula(num2letras($f['total']))." ".'Bolivianos',"","8");
celda(15,'Total'.": ","B","8");
celda(20,number_format($f['total'],2),"",10,"R");
/*$pdf->SetXY($x+177,$y+55);
celda(12,$idioma['Cajero'].": ","B","8");
celda(20,$Usuario,"",8,"");*/
$pdf->Ln();
$pdf->SetXY($x+140,$y+59);
celda(15,'Cancelado'.": ","B","8");
celda(20,number_format($f['pagado'],2),"",10,"R");

$pdf->SetXY($x+20,$y+63);
celda(37,'Fecha Límite de Emisión'.": ","B","8");
celda(15,fecha2Str($FechaLimiteEmision),"",8,"R");
if($Credito){
	$pdf->SetXY($x+100,$y+63);
	celda(35,$TextoCredito,"","6");
}

$pdf->SetXY($x+20,$y+59);
celda(30,'Codigo de Control'.": ","B","8");
celda(55,$f['codigocontrol'],"",8,"");
$pdf->SetXY($x+140,$y+63);
celda(15,'Cambio'.": ","B","8");
celda(20,number_format($f['devolucion'],2),"",10,"R");

$pdf->SetXY($x+177,$y+59);
celda(22,'NTransaccion'.": ","B","8");
celda(10,(($f['codfactura'])),"","8");

$pdf->SetXY($x+177,$y+63);
celda(10,'Hora'.": ","B","8");
celda(15,(($f['horaregistro'])),"","8");


$pdf->SetXY($x+47,$y+78);
celda(10,'"'.mayuscula($LeyendaPiePagina).'"',"B","8");

$pdf->SetXY($x+130,$y+13);
celda(10,'Actividad Económica'.": ".capitalizar($ActividadEconomica),"B","8");


$pdf->Image("../../imagenes/factura/codigos/".$CodFactura.".png",$x+22,$y+72,17,17);
$pdf->Output("Factura.pdf","I");
}
function celda($ancho,$texto,$estilo="",$tam=10,$ali=""){
	global $pdf;
	$pdf->SetFont("Tahoma",$estilo,$tam);
	$pdf->Cell($ancho,4,utf8_decode($texto),0,0,$ali);
}
?>