<?php

	include("includes/class.phpmailer.php");
	
	// Enviar los datos del formulario.
	$nombres       = $_POST['nombres'];
	$email	  	   = $_POST['email'];
	$telefono      = $_POST['telefono'];
	$direccion	   = $_POST['direccion'];
	$mensaje       = $_POST['mensaje'];	
	
	$mail             = new PHPMailer(); // defaults to using php "mail()"
	$mail->From       = "$email";
	$mail->FromName   = "$nombres";							

	$mail->AddAddress("ventas@impacto.pe", "IMPACTO PROMOCIONAL");

	$mail->Subject    = "IMPACTO PROMOCIONAL - Nuevo mensaje";
	
	$msg  = "Nombres y Apellidos: ".$nombres."<br/>";
	$msg .= "E-mail: ".$email."<br/>";
	$msg .= utf8_decode("Télefono").": ".$telefono."<br />";	
	$msg .= utf8_decode("Dirección").": ".$direccion."<br/><br/>";
	$msg .= "$mensaje";	
	
	$mail->MsgHTML($msg);
	$mail->IsHTML(true);
	$exito = $mail->Send();
	
	if($exito)
	{
		 $mail->ClearAddresses();
		 echo "<div align=\"center\" class=\"mensaje\">Gracias ".$nombres.". Tu mensaje se envio correctamente.</div>";
	}

?>