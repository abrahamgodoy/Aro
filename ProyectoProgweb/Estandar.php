<?php

	class CtlEstandar{
		
		private $mail;

		function enviarCorreo($subject, $body){
			require_once("Controladores/class.phpmailer.php");
			$mail = new phpmailer();	
			$mail->Mailer = "smtp";
			$mail->Host = "smtp.gmail.com";
			$mail->SMTPAuth = true;
			$mail->Port = 587;		
			$mail->CharSet= "UTF-8";
			$mail->SMTPSecure = "tls";
			$mail->Username = "rober.msz@gmail.com";
			$mail->Password = "3661981285740.ro27";
			$mail->SMTPDebug = 2;
			$mail->Debugoutput = "html";
			$mail->From = "rober.msz@gmail.com";
			$mail->FromName = "Roberto Mendoza Sanchez";
			$mail->AddAddress("rober.msz@gmail.com","RMS");
			$mail->Subject = $subject;
			$mail->Body = $body;
			$mail->AltBody = "";
			$mail->IsHTML(true);
			if($mail->Send())
			{
		   		echo "Mensaje enviado correctamente.";
			}
			else
			{
				echo "Ocurrió un error al enviar el correo electrónico.";
				echo "<br/><strong>Información:</strong><br/>".$mail->ErrorInfo;
			}
		}

		function generaPass(){
			$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
			$longitudCadena=strlen($cadena);
			$pass = "";
			$longitudPass=8;

			for($i=1 ; $i<=$longitudPass ; $i++){
				$pos=rand(0,$longitudCadena-1);
				$pass .= substr($cadena,$pos,1);
			}
			return $pass;
		}
	}

?>