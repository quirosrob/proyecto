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
			
			$finalDirectory=realpath(dirname(__FILE__)).DS."..".DS."..".DS."..".DS."webroot/img/uploads/";
			if(!file_exists($finalDirectory)){
				mkdir($finalDirectory, 0777);
			}

			$storedFileName=microtime(true).".".$this->getFileExtension($fileName);
			move_uploaded_file($fileNameTmp, $finalDirectory.DS.$storedFileName);
			return $storedFileName;
		}
		return null;
	}
	
	public function receiveFileFromBrowser($fileId){
		if(isset($_FILES[$fileId])){
			$fileName = $_FILES[$fileId]['name'];
			$fileNameTmp = $_FILES[$fileId]['tmp_name'];
			
			if(empty($fileName) || empty($fileNameTmp)){
				return null;
			}
			
			$finalDirectory=realpath(dirname(__FILE__)).DS."..".DS."..".DS."..".DS."webroot/img/uploads/";
			if(!file_exists($finalDirectory)){
				mkdir($finalDirectory, 0777);
			}
			
			$storedFileName=microtime(true).".".$this->getFileExtension($fileName);
			move_uploaded_file($fileNameTmp, $finalDirectory.DS.$storedFileName);
			return ['storedFileName'=>$storedFileName, 'fileName'=>$fileName];
		}
		return null;
	}
	
	public function receiveBackupFromBrowser($fileId){
		if(isset($_FILES[$fileId])){
			$fileName = $_FILES[$fileId]['name'];
			$fileNameTmp = $_FILES[$fileId]['tmp_name'];
			
			if(empty($fileName) || empty($fileNameTmp)){
				return null;
			}
			
			$finalDirectory=realpath(dirname(__FILE__)).DS."..".DS."..".DS."..".DS."webroot/backups/";
			if(!file_exists($finalDirectory)){
				mkdir($finalDirectory, 0777);
			}

			$storedFileName=microtime(true).".".$this->getFileExtension($fileName);
			move_uploaded_file($fileNameTmp, $finalDirectory.DS.$storedFileName);
			return $finalDirectory.DS.$storedFileName;
		}
		return null;
	}
}