<?php 

//RECIBIENDO LOS VALORES DEL FORMULARIO
$nombres 	= $_REQUEST['nombre'];
$apellidos 	= $_REQUEST['apellidos'];
$telefono 	= $_REQUEST['telefono'];
$email 		= $_REQUEST['email'];
$asunto 	= $_REQUEST['asunto'];
$comentario = $_REQUEST['comentario'];


//MANDANDO UN MENSAJE AL USUARIO QUE HA LLENADO EL FORMULARIO
$mensaje = '<html><head><title>Formulario de Contacto</title><style>#contenido{	text-align:justify;font-family:Arial, Helvetica, sans-serif;font-size:11px;padding:5px;color:#000}#tabla{padding:5px;border-style:solid;border-width:1px;
	border-color:#000;
}
</style>
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center" id="tabla">

	<td height="10"></td>
<tr/>
	<td style="line-height:20px;">
    <div id="contenido">
     <strong>'.$nombres.', </strong> gracias por sus comentarios.<br />
     Su comentario ha sido recibido y se le respondera en la brevedad posible.<br>
Este correo confirma su env&iacute;o efectuado desde nuestro formulario de contacto.<br />
Si recibe este correo por accidente, por favor, comun&iacute;quelo a nuestro <a href="mailto:ventas@impacto.pe" style="text-decoration:none"><strong style="color:#008DB1">Administrador</strong></a> de red.<br />

Si lo desea puede hacerlo a trav&eacute;s de nuestro <a href="http://www.impacto.pe/contactenos-impacto-promocional-lima-peru.php" style="text-decoration:none"><strong style="color:#008DB1">Formulario</strong></a> de contacto.<br />
    </div>
    </td>
</table>
</body>
</html>
';


$htmlheader='MIME-Version: 1.0' . "\r\n";
$htmlheader.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$to 			= $email;
$subject 		= "Mensaje de la Web";
$message 		= $mensaje;
$from 			= "From: ventas@impacto.pe";
$header 		= $from; 
$header 	   .= "\n"; 
$header 	   .= "MIME-version: 1.0\n"; 
$header 	   .= $htmlheader."\n";
mail($to, $subject, $message, $header);

//MANDANDO UN MENSAJE AL ADMINISTRADOR DE LA EMPRESA 
$mensaje2 = '<html><head><title></title><style>#tabla{	text-align:justify;font-family:Arial, Helvetica, sans-serif;font-size:11px;padding:5px;color:#0A2D6D;border-width:1px;border-style:solid;border-color:#000;}.texto{font-size:10px;font-family:Arial, Helvetica, sans-serif;color:#777777;text-align:justify;}</style></head><body><table width="354" border="0"  style=" margin-left:0px;font-family:Arial, Helvetica, sans-serif; color:#000; font-size:13px;"> <tr ><td width="144" class="fila">Nombres :</td><td width="200">'.$nombres.'</td></tr><tr><td class="fila">Apellidos :</td><td>'.$apellidos.'</td></tr>
<tr><td class="fila">Telefono :</td><td>'.$telefono.'</td>
</tr><tr><td class="fila">E - mail :</td><td>'.$email.'</td></tr><tr><td class="fila">Asunto :</td><td>'.$asunto.'</td></tr><tr><td class="fila">Comentario :</td><td>&nbsp;</td></tr><tr><td class="fila" ></td><td>'.$comentario.'</td></tr><tr><td class="fila">&nbsp;</td><td class="fila">&nbsp;</td></tr><tr><td class="fila">&nbsp;</td><td>&nbsp;</td></tr></table></body></html>';

$htmlheader='MIME-Version: 1.0' . "\r\n";
$htmlheader.='Content-type: text/html; charset=iso-8859-1' . "\r\n";
$to 			= 'ventas@impacto.pe';
$subject 		= "Asunto : ".$asunto."";
$message 		= $mensaje2;
$from 			= "From: ".$email."";
$header 		= $from; 
$header 	   .= "\n"; 
$header 	   .= "MIME-version: 1.0\n"; 
$header 	   .= $htmlheader."\n";
mail($to, $subject, $message, $header);


//REDIRECCIONANDO AL FORMULARIO
header('Location: contactenos-impacto-promocional-lima-peru.php?send=true');

?>
