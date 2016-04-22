<?php

	include("includes/class.phpmailer.php");
	include("includes/class.smtp.php"); //agregado nuevo


	include("includes/funciones.php");
	include("includes/conexion.php");
	
	$cn = Conexion();
	
	// Enviar los datos del formulario.
	$idproducto    = $_POST['producto'];
	$razon_social  = $_POST['razon_social'];
	$nombres       = $_POST['nombres'];
	$email	  	   = $_POST['email'];
	$telefono	   = $_POST['telefono'];
	$direccion	   = $_POST['direccion'];
	$cantidad	   = $_POST['cantidad'];
	$mensaje	   = $_POST['mensaje'];
	
	// consultar el pedido del producto.
	$sql_pedido_producto  = "SELECT * FROM productos WHERE idproducto = '".$idproducto."'";
	$rpta_pedido_producto = query($sql_pedido_producto) or die(mysql_error());
	$row_pedido_producto  = fetch_array($rpta_pedido_producto);
	
	// agregar el producto solicitado.
	agregarPedidoProducto($idproducto,$nombres,$email,$telefono,$direccion,$cantidad,$mensaje);	
	
	$mail             = new PHPMailer(); // defaults to using php "mail()"

	$mail->IsSMTP(); // send via SMTP
	$mail->SMTPSecure = 'ssl';
	$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->Port       = 465;
	$mail->SMTPAuth   = true; // turn on SMTP authentication

	$mail->Username   = "jgomez@ingenioart.com"; // Enter your SMTP username
	$mail->Password   = "jgomez1717"; // SMTP password


	$mail->From       = "$email";
	$mail->FromName   = "$nombres";							

	$mail->AddAddress("ingenioart@hotmail.com", "IMPACTO PROMOCIONAL");
	$mail->AddAddress("ventas@impacto.pe", "IMPACTO PROMOCIONAL");

	$mail->AddAddress("jgomez@ingenioart.com", "IMPACTO PROMOCIONAL");

	$mail->Subject    = "IMPACTO PROMOCIONAL - pedidos www.impacto.pe";
	
	$msg = 'El cliente '.$nombres.' Solicito este producto:';
	$msg .= '<table width="389" border="0" cellspacing="0" cellpadding="0">';
	$msg .= '<tr>';
	$msg .= '<td width="175" valign="top">
				<img border="0" src="http://www.impacto.pe/demo/images/productos/portada/'.$row_pedido_producto['imagen_prod_portada'].'" title="'.$row_pedido_producto['nombre_producto'].'" alt="'.$row_pedido_producto['nombre_producto'].'" />
			 </td>';
	$msg .= '<td width="214">
				 <p>Cod.: '.$row_pedido_producto['codigo_producto'].'</p>
				 <p>Producto: <span>'.$row_pedido_producto['nombre_producto'].'</span></p>				
			 </td>';
	$msg .= '</tr>';
	$msg .= '</table>';
	$msg .= '------------------------------------------------------------------------------------------';
	$msg .= '<br /><br />';
	$msg .= 'Datos personales del solicitante:<br /><br />';
	$msg .= utf8_decode('Razón social').': '.$razon_social.'<br />';
	$msg .= 'Nombres y Apellidos: '.$nombres.'<br />';	
	$msg .= 'E-mail: '.$email.'<br />';
	$msg .= utf8_decode('Teléfono').': '.$telefono.'<br />';
	$msg .= utf8_decode('Dirección').': '.$direccion.'<br />';
	$msg .= 'Cantidad: '.$cantidad.'<br /><br />';	
	$msg .= 'Mensaje:'.$mensaje.'';
	
	$mail->MsgHTML($msg);
	$mail->IsHTML(true);
	$exito = $mail->Send();
	
	if($exito)
	{
		$mail->ClearAddresses();
		echo "<div align=\"center\" class=\"mensaje_pedido\">Su pedido se envio con exito. Gracias.</div>";
	} else{
		echo "Mailer Error: " . $mail->ErrorInfo;
	}

?>