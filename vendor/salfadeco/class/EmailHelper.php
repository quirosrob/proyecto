<?php
namespace salfadeco;
use PHPMailer;

class EmailHelper{
	public function sentEmail($to, $cc, $bcc, $subject, $body){
		try {
			$conf=(new Configuration())->getConfiguration();
			
			$mail = new PHPMailer(false);
			$mail->IsSMTP();
			$mail->charSet = "UTF-8";
			$mail->SMTPAuth = true;
			$mail->Subject = $subject;
			$mail->Body = $body;
			$mail->IsHTML(true);
			
			$mail->Host = $conf['SMTP_Host'];
			$mail->Username = $conf['SMTP_Username'];
			$mail->Password = $conf['SMTP_Password']; 
			$mail->Port = $conf['SMTP_Port'];
			$mail->From = $conf['SMTP_From'];
			$mail->FromName = $conf['SMTP_FromName'];
			if(!empty($conf['SMTP_SMTPSecure'])){
				$mail->SMTPSecure = $conf['SMTP_SMTPSecure'];
			}
			
			
			if(!empty($to)){
				$mail->AddAddress($to, '');
			}
			if(!empty($cc)){
				$mail->addCC($cc, '');
			}
			if(!empty($bcc)){
				$mail->addBCC($bcc, '');
			}

			return $mail->Send();
		}catch(Exception $e){
			echo $e->getMessage();
			return false;
		}
	}
}