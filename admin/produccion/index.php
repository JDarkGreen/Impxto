<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../control.php");	
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();
	
	$sql_produccion  = "SELECT * FROM produccion_video ORDER BY idvideo DESC";
	$rpta_produccion = query($sql_produccion) or die(mysql_error());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script type="text/javascript">
	function borrar(cod)
	{
		con = confirm("Desea borrar este video de produccion ?");
		if(con==true)
		{
			document.form1.action = "eliminar.php?cod="+cod;
			document.form1.submit();
		}
	}
	
</script>
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
      <p>Produccion videos</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" action="">
        <table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
               <td width="850" colspan="3" align="center">&nbsp;</td>
            </tr>
            <tr>
               <td colspan="3" align="center"><a href="agregar.php">Agregar producción video</a></td>
            </tr>
         </table>
         <table width="850" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td colspan="2">&nbsp;</td>
               <td width="55">&nbsp;</td>
               <td width="78">&nbsp;</td>
            </tr>
            <tr class="tdrow1">
               <td width="29">No</td>
               <td width="279">Titulo del video</td>
               <td>Editar</td>
               <td>Eliminar</td>
            </tr>
            <?php
			$i = 1;
      		while($row = fetch_array($rpta_produccion))
			{
				 if($c==1){ $color='#FFFFFF'; $c=2;} else { $color='#F3F3F3'; $c=1;}				
				
	     	?>
            <tr bgcolor="<?php echo $color; ?>">
               <td class="tdrow2"><?php echo $i; ?></td>
               <td class="tdrow2"><?php echo utf8_encode($row['titulo_video']); ?></td>
               <td align="center" class="tdrow2"><a href="editar.php?idproduccion=<?php echo $row['idvideo']; ?>"><img src="../imagenes/application_form_edit.png" width="16" height="16" border="0" /></a></td>
               <td align="center" class="tdrow2"><img src="../imagenes/application_form_delete.png" width="16" height="16" onclick="borrar('<?php echo $row['idvideo']; ?>');" style="cursor:pointer;"/></td>
            </tr>
            <?php
				$i++;
			}
	  ?>
         </table>
      </form>
   </div>
</div>
</body>
</html>