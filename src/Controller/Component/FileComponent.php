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
	
	public function receiveImagesFromBrowser($fileId){
		$storedFileNames=[];
		if(isset($_FILES[$fileId])){
			foreach($_FILES[$fileId]['name'] as $index => $name){
				$fileName = $_FILES[$fileId]['name'][$index];
				$fileNameTmp = $_FILES[$fileId]['tmp_name'][$index];
				
				if(empty($fileName) || empty($fileNameTmp) || !$this->fileIsImage($fileName)){
					continue;
				}

				if(!file_exists(UPLOADS_DIRECTORY)){
					mkdir(UPLOADS_DIRECTORY, 0777);
				}

				$storedFileName=microtime(true).".".$this->getFileExtension($fileName);
				move_uploaded_file($fileNameTmp, UPLOADS_DIRECTORY.DS.$storedFileName);
				$storedFileNames[]=$storedFileName;
			}
		}
		return $storedFileNames;
	}
	
	public function receiveImageFromBrowser($fileId){
		if(isset($_FILES[$fileId])){
			$fileName = $_FILES[$fileId]['name'];
			$fileNameTmp = $_FILES[$fileId]['tmp_name'];
			
			if(empty($fileName) || empty($fileNameTmp) || !$this->fileIsImage($fileName)){
				return null;
			}
			
			if(!file_exists(UPLOADS_DIRECTORY)){
				mkdir(UPLOADS_DIRECTORY, 0777);
			}

			$storedFileName=microtime(true).".".$this->getFileExtension($fileName);
			move_uploaded_file($fileNameTmp, UPLOADS_DIRECTORY.DS.$storedFileName);
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
			
			if(!file_exists(UPLOADS_DIRECTORY)){
				mkdir(UPLOADS_DIRECTORY, 0777);
			}
			
			$storedFileName=microtime(true).".".$this->getFileExtension($fileName);
			move_uploaded_file($fileNameTmp, UPLOADS_DIRECTORY.DS.$storedFileName);
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
			
			if(!file_exists(BACKUP_DIRECTORY)){
				mkdir(BACKUP_DIRECTORY, 0777);
			}

			$storedFileName=microtime(true).".".$this->getFileExtension($fileName);
			move_uploaded_file($fileNameTmp, BACKUP_DIRECTORY.DS.$storedFileName);
			return ['storedFileName'=>$storedFileName, 'fileName'=>$fileName];
		}
		return null;
	}
}