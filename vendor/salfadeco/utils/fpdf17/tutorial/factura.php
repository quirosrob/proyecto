<?php
require('../fpdf.php');
include('funcionesFactura.php');

class PDF extends FPDF
{
	var $tipoPago;	
	
	//$ffac = new funcionesFact();
	// Cabecera de página
	function Header(){
		$this->Image('callmyway.jpg',10,10,60);		
		
		$this->Cell(130);
		$this->SetFont('Arial','B',10);
		$this->Cell(15,4,'FACTURA');		
		$this->Ln();
		$this->Cell(120);
		$this->SetFont('Arial','B',8);
		$this->Cell(17,4,'CONTADO ');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Cell(5,4,"X",1,0,'C');
		$this->SetTextColor(0);
		$this->SetFont('Arial','B',8);
		$this->Cell(15,4,' CREDITO ');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Cell(5,4," ",1,0,'C');
		$this->SetTextColor(0);
		$this->Ln();
		$this->Ln();
		
		$this->Cell(120);
		$this->SetFont('Arial','B',8);
		$this->Cell(15,4,'DIA',1,0,'C');
		$this->Cell(15,4,'MES',1,0,'C');
		$this->Cell(15,4,'AÑO',1,0,'C');
		$this->Ln();
		$this->Cell(120);
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Cell(15,4,date("d"),1,0,'C');
		$this->Cell(15,4,date("m"),1,0,'C');
		$this->Cell(15,4,date("Y"),1,0,'C');
		$this->SetTextColor(0);
		
	}
	
	// Pie de página
	function Footer(){
		/*
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial','I',8);
		// Número de página
		$this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
		*/
	}	
	
	function ImprovedTable($header, $data, $currency, $iVentas, $iCruzRoja, $i911, $numeroFactura){
		$ffac = new funcionesFact();
		$logoMoneda=$currency==0? "dolar.jpg" : "colon.jpg";
		$offsetMonedaY=53.5;		
		
		$this->Ln(7);
		// Anchuras de las columnas
		$w = array(10, 10, 100, 25, 25);
		// Cabeceras
		$this->SetFont('Arial','B',9);
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],7,$header[$i],1,0,'C');
		$this->Ln();
		
		// Datos
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$subTotal=0;
		$cantLineas=0;
		foreach($data as $row){	
			$cantLineas++;
			$this->Cell($w[0],4,$row[0],'LR',0,'C');
			$this->Cell($w[1],4,$row[1],'LR',0,'C');
			$this->Cell($w[2],4,$row[2],'LR',0,'L');
			$this->Cell($w[3],4,number_format($row[3],2),'LR',0,'C');
			$this->Cell($w[4],4,number_format($row[4],2),'LR',0,'C');
			$this->Ln();
			$subTotal+=$row[4];
		}
		
		for($i=count($data); $i<10; $i++){
			$cantLineas++;
			$this->Cell($w[0],4,"",'LR',0,'C');
			$this->Cell($w[1],4,"",'LR',0,'C');
			$this->Cell($w[2],4,"",'LR',0,'L');
			$this->Cell($w[3],4,"",'LR',0,'C');
			$this->Cell($w[4],4,"",'LR',0,'C');
			$this->Ln();			
		}
		
		$this->SetTextColor(0);
		// Línea de cierre
		$this->Cell(array_sum($w),0,'','T');
		
		$this->Ln();
		$this->SetFont('Arial','B',9);
		$this->Cell(31,4,"Recibido conforme:",'TL',0,'L');		
		$this->Cell(50,4,"",'TB',0,'L');		
		$this->Cell(13,4,"Cédula:",'T',0,'L');
		$this->Cell(24,4,"",'TB',0,'L');
		$this->Cell(2,4,"",'T',0,'L');
		
		$this->Cell($w[3],4,"SUB-TOTAL",'TBLR',0,'R');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Image($logoMoneda,156,$offsetMonedaY+($cantLineas+0)*4,1.5);
		$this->Cell($w[4],4,number_format($subTotal,2),'TBLR',0,'R');
		$this->SetTextColor(0);
		
		
		$pronunciado=$ffac->dividirLinea($ffac->pronunciar(round($subTotal*(1+($iVentas+$iCruzRoja+$i911)/100),2), $currency), 62);
		$this->Ln();
		$this->SetFont('Arial','B',9);
		$this->Cell(25,4,"Valor en Letras:",'L',0,'L');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Cell(93,4,$pronunciado['1'],'B',0,'L');
		$this->Cell(2,4,"",0,0,'L');		
		
		$this->SetFont('Arial','B',7);
		$this->SetTextColor(0);
		$this->Cell($w[3],4,"Imp. Ventas($iVentas%)",'BTLR',0,'R');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Image($logoMoneda,156,$offsetMonedaY+($cantLineas+1)*4,1.5);
		$this->Cell($w[4],4,number_format($subTotal*$iVentas/100,2),'TLR',0,'R');
		$this->SetTextColor(0);
		
		$this->Ln();
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Cell(2,4,"","L",0,'C');
		$this->Cell(116,4,$pronunciado['2'],'B',0,'L');
		$this->Cell(2,4,"",0,0,'C');
		
		$this->SetFont('Arial','B',7);
		$this->SetTextColor(0);
		$this->Cell($w[3],4,"Imp. Cruz Roja($iCruzRoja%)",'BLR',0,'R');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Image($logoMoneda,156,$offsetMonedaY+($cantLineas+2)*4,1.5);	
		$this->Cell($w[4],4,number_format($subTotal*$iCruzRoja/100,2),'TBLR',0,'R');
		$this->SetTextColor(0);
		
		$this->Ln();
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Cell(120,4,$pronunciado['3'],'LB',0,'L');
		
		$this->SetFont('Arial','B',7);
		$this->SetTextColor(0);		
		$this->Cell($w[3],4,"Imp. 911($i911%)",'BLR',0,'R');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Image($logoMoneda,156,$offsetMonedaY+($cantLineas+3)*4,1.5);
		$this->Cell($w[4],4,number_format($subTotal*$i911/100,2),'TBLR',0,'R');
		$this->SetTextColor(0);
		
		
		$this->Ln();
		$this->SetFont('Arial','B',9);
		$this->Cell(26,4,"Tipo de cambio:",'LB',0,'L');
		$this->Cell(33,4,"",'BR',0,'L');
		$this->SetFont('Arial','B',5);
		$this->Cell(61,4,"Esta factura devengará intereses del 4% mensual después de 30 días",'B',0,'L');
		
		$this->SetFont('Arial','B',9);		
		$this->Cell($w[3],4,""."TOTAL",'TBLR',0,'R');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Image($logoMoneda,156,$offsetMonedaY+($cantLineas+4)*4,1.5);
		$this->Cell($w[4],4,number_format($subTotal*(1+($iVentas+$iCruzRoja+$i911)/100),2),'TBLR',0,'R');
		$this->SetTextColor(0);
		
		$this->SetFont('Arial','B',14);
		$this->SetTextColor(255,0,0);
		$this->Ln();
		$this->Cell(array_sum($w),7,""."N° $numeroFactura",0,0,'R');
		
		$this->SetFont('Arial','B',12);
		$this->SetTextColor(0);
					
	}
	
	function datosCliente($nombre, $telefono, $direccion){
		$this->Ln(8);
		
		$this->SetFont('Arial','B',9);
		$this->Cell(15,5,"Cliente:",'0',0,'L');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Cell(115,5,$nombre,'B',0,'L');
		$this->SetTextColor(0);
		
		$this->SetFont('Arial','B',9);
		$this->Cell(8,5,"Tel.:",'0',0,'L');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Cell(27,5,$telefono,'B',0,'L');
		$this->SetTextColor(0);
		
		$this->Ln();
		
		$this->SetFont('Arial','B',9);
		$this->Cell(18,5,"Dirección:",'0',0,'L');
		$this->SetFont('Courier','B',7);
		$this->SetTextColor(55);
		$this->Cell(147,5,$direccion,'B',0,'L');
		$this->SetTextColor(0);
	}
}

function crearfactura($nombre, $telefono, $direccion, $currency, $data, $nombreArchivo, $iVentas, $iCruzRoja, $i911, $numeroFactura, $formaPago){	
	$header = array('CANT.', 'COD.', 'DESCRIPCION', 'PRECIO UNIT.', 'TOTAL');
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage("P", array('0'=>6.2*30,'1'=>6.5*30));
	//$pdf->AddPage();
	$pdf->datosCliente($nombre, $telefono, $direccion);	
	$pdf->ImprovedTable($header,$data, $currency, $iVentas, $iCruzRoja, $i911, $numeroFactura);
	$pdf->Output($nombreArchivo, 'F');
	$pdf->Output();
}

function LoadData($file){
	// Leer las líneas del fichero
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

$data = LoadData('items.txt');
crearfactura("Robert Quiros", "4000-4000", "zapote frente al colegio de abogados", 1, $data, "factura.pdf", 13, 1, 1, 4567890, $formaPago);


/*
		$ffac = new funcionesFact();
		
		$num=1234567.89;
		echo number_format($num, 2)."<br/>";
		echo $ffac->pronunciar($num, 0)."<br/><br/>";

		$num=1000001.82;
		echo number_format($num, 2)."<br/>";
		echo $ffac->pronunciar($num, 0)."<br/><br/>";
		
		$num=2000;
		echo number_format($num, 2)."<br/>";
		echo $ffac->pronunciar($num, 0)."<br/><br/>";
		
		$num=0.45;
		echo number_format($num, 2)."<br/>";
		echo $ffac->pronunciar($num, 0)."<br/><br/>";
*/
?>


