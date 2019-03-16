<?php
namespace salfadeco;

class DbConnector extends Singleton{
	var $conection=null;
	private function getConnection(){
		if($this->conection===null || !$this->conection->ping()){
			if($this->conection!==null){
				$this->conection->close();
			}
			
			$conf=(new Configuration())->getConfiguration();
			$this->conection = mysqli_connect($conf['db_host'], $conf['db_user'], $conf['db_password'], $conf['db_db'], $conf['db_port']);
		}
		
		return $this->conection;
	}
	
	private function logError($error){
		$path=realpath(dirname(__FILE__));
		$filePath="$path/../logs/error.log";
		$fp = fopen($filePath,"a");
		fwrite($fp, PHP_EOL);
		fwrite($fp, date("Y-m-d H:i:s").PHP_EOL);
		fwrite($fp, $error.PHP_EOL);
		fclose($fp);
	}
	
	public function execStatement($sql){
		$conn=$this->getConnection();
		try{
			$conn->query($sql);
			if(!empty($conn->error)){
				$this->logError("ERROR: {$conn->error}, SQL:{$sql}");
				return false;
			}
			return true;
		}catch(Exception $e){
			$this->logError("ERROR: {$e}, SQL:{$sql}");
			return false;
		}
	}
	
	public function execQuery($sql){
		$conn=$this->getConnection();
		try{
			$results=$conn->query($sql);
			
			if(!empty($conn->error)){
				$this->logError("ERROR: {$conn->error}, SQL:{$sql}");
				return null;
			}
			
			if(!$results){
				return null;
			}
			$results->data_seek(0);
			$rows=[];
			while ($row = $results->fetch_assoc()){
				$rows[]=$row;
			}
			return $rows;
		}catch(Exception $e){
			$this->logError("ERROR: {$e}, SQL:{$sql}");
			return null;
		}
	}
	
}
