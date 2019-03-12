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
	
	public function execStatement($sql){
		$conn=$this->getConnection();
		try{
			$conn->query($sql);
			return true;
		}catch(Exception $e){
			return false;
		}
	}
	
	public function execQuery($sql){
		$conn=$this->getConnection();
		try{
			$results=$conn->query($sql);
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
			return null;
		}
	}
	
}
