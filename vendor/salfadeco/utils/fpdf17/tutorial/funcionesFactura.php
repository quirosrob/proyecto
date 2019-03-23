<?php
class funcionesFact
{
	function pronunciaUnidad($num){
		switch($num){
			case 0: return "";
			case 1: return "uno";
			case 2: return "dos";
			case 3: return "tres";
			case 4: return "cuatro";
			case 5: return "cinco";
			case 6: return "seis";
			case 7: return "siete";
			case 8: return "ocho";
			case 9: return "nueve";
		}
	}
	
	function pronunciaDecena($dec, $uni){
		if($dec<=0){
			return $this->pronunciaUnidad($uni);
		}
		else if($dec<=2){
			$valor=$dec*10+$uni;
			switch($valor){				
				case 10: return "diez";
				case 11: return "once";
				case 12: return "doce";
				case 13: return "trece";
				case 14: return "catorce";
				case 15: return "quince";
				case 16: return "dieciseis";
				case 17: return "diecisiete";
				case 18: return "dieciocho";
				case 19: return "diecinueve";
				case 20: return "veinte";
				case 21: return "veintiun";
				case 22: return "veintidos";
				case 23: return "veintitres";
				case 24: return "veinticuatro";
				case 25: return "veinticinco";
				case 26: return "veintiseis";
				case 27: return "veintisiete";
				case 28: return "veintiocho";
				case 29: return "veintinueve";
			}
		}
		else{
			switch($dec){				
				case 3: return $uni==0? "treinta": "treinta y ".$this->pronunciaUnidad($uni);
				case 4: return $uni==0? "cuarenta": "cuarenta y ".$this->pronunciaUnidad($uni);
				case 5: return $uni==0? "cincuenta": "cincuenta y ".$this->pronunciaUnidad($uni);
				case 6: return $uni==0? "sesenta": "sesenta y ".$this->pronunciaUnidad($uni);
				case 7: return $uni==0? "setenta": "setenta y ".$this->pronunciaUnidad($uni);
				case 8: return $uni==0? "ochenta": "ochenta y ".$this->pronunciaUnidad($uni);
				case 9: return $uni==0? "noventa": "noventa y ".$this->pronunciaUnidad($uni);
			}
		}
	}
	
	function pronunciaCentena($cent, $dec, $uni){
		switch($cent){
			case 0: return $this->pronunciaDecena($dec, $uni);
			case 1: return $dec==0 && $uni==0? "cien": "ciento ".$this->pronunciaDecena($dec, $uni);
			case 2: return "doscientos ".$this->pronunciaDecena($dec, $uni);
			case 3: return "trecientos ".$this->pronunciaDecena($dec, $uni);
			case 4: return "cuatrocientos ".$this->pronunciaDecena($dec, $uni);
			case 5: return "quinientos ".$this->pronunciaDecena($dec, $uni);
			case 6: return "seiscientos ".$this->pronunciaDecena($dec, $uni);
			case 7: return "setecientos ".$this->pronunciaDecena($dec, $uni);
			case 8: return "ochocientos ".$this->pronunciaDecena($dec, $uni);
			case 9: return "novencientos ".$this->pronunciaDecena($dec, $uni);
		}
	}
	
	function pronunciaMillar($centMil, $decMil, $uniMil, $cent, $dec, $uni){
		$valorMil=$centMil*100+$decMil*10+$uniMil;
		switch($valorMil){
			case 0: return $this->pronunciaCentena($cent, $dec, $uni);
			case 1: return "mil ". $this->pronunciaCentena($cent, $dec, $uni);
			default: return $this->pronunciaCentena($centMil, $decMil, $uniMil)." mil ".$this->pronunciaCentena($cent, $dec, $uni);
		}
	}
	
	function pronunciaMillon($mill, $centMil, $decMil, $uniMil, $cent, $dec, $uni){
		
		if($mill+$centMil+$decMil+$uniMil+$cent+$dec+$uni==0)
			return "cero";
	
		switch($mill){				
			case 0: return $this->pronunciaMillar($centMil, $decMil, $uniMil, $cent, $dec, $uni);
			case 1: return "un millon ". $this->pronunciaMillar($centMil, $decMil, $uniMil, $cent, $dec, $uni);
			default: return $this->pronunciaUnidad($mill)." millones ".$this->pronunciaMillar($centMil, $decMil, $uniMil, $cent, $dec, $uni);
		}
	}
	
	function getDigito($num, $i){		
		$num="".$num;		
		return $num[strlen($num)-$i-1];
	}
	
	function pronunciar($num, $currency){
		$mill	=$this->getDigito(floor($num), 6);
		$centMil=$this->getDigito(floor($num), 5);
		$decMil	=$this->getDigito(floor($num), 4);
		$uniMil	=$this->getDigito(floor($num), 3);
		$cent	=$this->getDigito(floor($num), 2);
		$dec	=$this->getDigito(floor($num), 1);
		$uni	=$this->getDigito(floor($num), 0);
		$decimos=$this->getDigito(round($num*100,0), 1);
		$centimos=$this->getDigito(round($num*100,0), 0);
		
		$sonidoDecimales=$this->pronunciaDecena($decimos, $centimos);
		if($sonidoDecimales=="")
			$sonidoDecimales='cero';
		
		if($currency==0)
			return $this->pronunciaMillon($mill, $centMil, $decMil, $uniMil, $cent, $dec, $uni)." dolares con ".$sonidoDecimales." centavos.";
		else
			return $this->pronunciaMillon($mill, $centMil, $decMil, $uniMil, $cent, $dec, $uni)." colones con ".$sonidoDecimales." centimos.";
	}
	
	function dividirLinea($linea, $tam){
		$index=0;
		if($tam>strlen($linea))
			return strlen($linea)-1;
		
		for($i=0; $i<strlen($linea); $i++){
			if($linea[$i]==" " && $i<$tam)
				$index=$i;				
		}
		$linea1=substr ($linea, 0, $index+1);
		$linea2=substr ($linea, $index+1, strlen($linea)-($index-1));
		return array("1"=>$linea1, "2"=>$linea2);
	}
}
?>