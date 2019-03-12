<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class FileComponent extends Component
{
	private function getFileExtension($fileName){
		return pathinfo($fileName, PATHINFO_EXTENSION);
	}

	private function fileIsImage($fileName){
		$ext=$this->getFileExtension($fileName);
		return in_array(strtolower($ext), ['jpg', 'png', 'jpeg', 'bmp']);
	}
	
	public function receiveImageFromBrowser($fileId){
		if(isset($_FILES[$fileId])){
			$fileName = $_FILES[$fileId]['name'];
			$fileNameTmp = $_FILES[$fileId]['tmp_name'];
			
			if(empty($fileName) || empty($fileNameTmp) || !$this->fileIsImage($fileName)){
				return null;
			}
			
			$finalDirectory=realpath(dirname(__FILE__))."/../../webroot/img/uploads/";
			if(!file_exists($finalDirectory)){
				mkdir($finalDirectory, 0777);
			}
			
			echo $finalDirectory;

			$storedFileName=microtime(true).".".$this->getFileExtension($fileName);
			move_uploaded_file($fileNameTmp, $finalDirectory.DS.$storedFileName);
			return ['storedFileName'=>$storedFileName, "fileName"=>$fileName];
		}
		return null;
	}
}