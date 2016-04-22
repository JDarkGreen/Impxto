<?php

	session_start();
	include("control.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
<title>IMPACTO PROMOCIONAL SAC - Panel de administracion</title>
</head>

<body>
<div id="contenedor">
   <div id="cuerpo_cpanel">
      <div id="cabecera_titulo">
         <p><?php echo "Bienvenido ".$_SESSION['admin_admin']; ?></p>
         <div id="cabecera_salir"> <a href="cerrar-sistema.php">Cerrar sesion</a></div>
      </div>
      <div id="cabecera_portada"> </div>
      <div id="titulo_cpanel">
         <p>Administracion catalogo</p>
      </div>
      <div id="contenido_cpanel">
         <table width="776" border="0" cellpadding="0" cellspacing="0">
            <tr>
               <td width="183">&nbsp;</td>
               <td width="154">&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
            </tr>
            <tr>
               <td align="center"><a href="secciones/index.php"><img src="imagenes/categorias.png" width="120" height="131" border="0" /></a></td>
               <td align="center"><a href="productos/index.php"><img src="imagenes/productos.png" width="123" height="134" border="0" /></a></td>
               <td width="154" align="center"><a href="portada/index.php"><img src="imagenes/portada.png" width="120" height="136" border="0" /></a></td>
               <td width="143" align="center"><a href="banner/index.php"><img src="imagenes/banner.png" width="128" height="128" border="0" /></a></td>
               <td width="142" align="center"><a href="novedades/index.php"><img src="imagenes/novedades.png" width="128" height="128" /></a></td>
            </tr>
         </table>
      </div>
      <div style="margin-top:25px;"></div>
      <div id="titulo_cpanel">
         <p>Configuracion</p>
      </div>
      <div id="contenido_cpanel">
         <table width="778" border="0" cellpadding="0" cellspacing="0">
            <tr>
               <td width="163">&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td align="center"><a href="usuarios/index.php"><img src="imagenes/administrador.png" width="97" height="137" border="0" /></a></td>
               <td width="164" align="center"><a href="produccion/index.php"><img src="imagenes/videos.png" width="128" height="128" /></a></td>
               <td width="156" align="center"><a href="nosotros/index.php"><img src="imagenes/nosotros.png" width="128" height="128" border="0" /></a></td>
               <td width="161" align="center"><a href="contactenos/index.php"><img src="imagenes/contactenos.png" border="0" /></a></td>
               <td width="134" align="center">&nbsp;</td>
            </tr>
         </table>
      </div>
   </div>
</div>
</div>
</body>
</html>