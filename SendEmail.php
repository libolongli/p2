<?php
	require 'class.phpmailer.php';
	class SendEmail extends PHPMailer{
		public function __construct(){
			require 'config.php';
			$this->IsSMTP();                           // tell the class to use SMTP
			$this->SMTPAuth   = true;                  // enable SMTP authentication
			$this->Port       = 25;                    // set the SMTP server port
			$this->Host       = $config['host']; // SMTP server
			$this->Username   = $config['username'];     // SMTP server username
			$this->Password   = $config['password'];            // SMTP server password

			//$mail->IsSendmail();  // tell the class to use Sendmail

			//$mail->AddReplyTo("name@domain.com","First Last");
			$this->SetLanguage('ch');
			$this->From       = $config['username'];
			$tmp = explode(',', $config['username']);
			$this->FromName   = $tmp[0];
			
		
		}
		public function sendEmail($email,$subject,$content){
			$to = $email;
			$this->AddAddress($to);
			$this->Subject  = $subject;
			$this->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
			$this->WordWrap   = 80; // set word wrap

			$this->MsgHTML($content);

			$this->IsHTML(true); // send as HTML
			$this->Send();
		}
	}