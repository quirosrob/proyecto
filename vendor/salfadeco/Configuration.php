<?php
namespace salfadeco;

class Configuration {
	public function getConfiguration(){
		return [
			'db_host'=>'localhost',
			'db_user'=>'root',
			'db_password'=>'',
			'db_db'=>'salfadeco',
			'db_port'=>'3306',
		];
	}
}
