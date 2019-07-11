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
			
			
//			'SMTP_Host'=>'smtp.gmail.com',
//			'SMTP_Username'=>'salfadeco@gmail.com',
//			'SMTP_Password'=>'Azsxdcfv1',
//			'SMTP_From'=>'salfadeco@gmail.com',
//			'SMTP_FromName'=>'Salon de la fama',
//			'SMTP_Port'=>'465', /* 465, 587 */
//			'SMTP_SMTPSecure'=>'ssl', /* 'ssl', 'tls', false */
			
			'SMTP_Host'=>'p3plcpnl1008.prod.phx3.secureserver.net',
			'SMTP_Username'=>'salfadeco@galdepo.com',
			'SMTP_Password'=>'Azsxdcfv1',
			'SMTP_From'=>'salfadeco@galdepo.com',
			'SMTP_FromName'=>'Salon de la fama',
			'SMTP_Port'=>'465', /* 465, 587 */
			'SMTP_SMTPSecure'=>'ssl', /* 'ssl', 'tls', false */
		];
	}
}
