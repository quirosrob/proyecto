<?php
namespace salfadeco;
use FPDF;

class PdfQr extends FPDF
{	
	public function makeQrs($members, $filePath){
		$this->AliasNbPages();
		$r=0;
		$c=0;
		foreach($members as $member){
			if($r==0 && $c==0){
				$this->AddPage();
			}
			$y=$r*60+11;
			$x=$c*95+32.5;
			
			if($c==0){
				$this->Cell(95,50, '', "RLT");
				$this->Cell(95,50, '', "RLT");
				$this->Ln();
			}
			
			$c++;
			if($c>1){
				$c=0;
				$r++;
			}
			
			if($r>3){
				$r=0;
			}
			
			$qrPath=realpath(dirname(__FILE__))."/../../../webroot/img/qr/member_{$member['id']}.png";
			$this->Image($qrPath,$x,$y,50,50);
			$this->SetFont('Arial','',8);
			$this->Cell(95,10, utf8_decode($member['name']), "RLB", '', 'C');
			if($c==0){
				$this->Ln();
			}
		}
		if($c==1){
			$this->Cell(95,10, "", "RLB", '', 'C');
		}
		
		
		$this->Output($filePath, 'F');
	}
}