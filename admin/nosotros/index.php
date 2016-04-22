<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../control.php");	
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();
	
	$sql_nosotros  = "SELECT * FROM nosotros";
	$rpta_nosotros = query($sql_nosotros) or die(mysql_error());
	$row 		   = fetch_array($rpta_nosotros);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<title>IMPACTO PROMOCIONAL SAC - Panel de administracion</title>
</head>

<body>
<div id="contenedor">
<div id="cuerpo_cpanel">
   <div id="cabecera_titulo">
      <p><?php echo "Bienvenido ".$_SESSION['admin_admin']; ?></p>
      <div id="cabecera_salir"> <a href="../cerrar-sistema.php">Cerrar sesion</a></div>
   </div>
   <div id="cabecera_portada"> </div>
   <div id="titulo_cpanel">
      <p>Nosotros</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" action="">
         <table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
               <td width="850" colspan="3" align="center">&nbsp;</td>
            </tr>
            <tr>
               <td colspan="3" align="center">&nbsp;</td>
            </tr>
         </table>
         <table width="850" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td>&nbsp;</td>
               <td width="117">&nbsp;</td>
            </tr>
            <tr class="tdrow1">
               <td width="725">Contenido</td>
               <td>Editar</td>
            </tr>
            <tr>
               <td class="tdrow2"><?php echo $row['descripcion']; ?></td>
               <td valign="top" class="tdrow2"><a href="editar.php?id=<?php echo $row['id']; ?>"><img src="../imagenes/application_form_edit.png" width="16" height="16" border="0" /></a></td>
            </tr>

         </table>
      </form>
   </div>
</div>
</body>
</html>