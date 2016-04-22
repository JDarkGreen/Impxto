<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../control.php");	
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();	
	
	$sql_productos  = "SELECT p. * , c. * FROM productos p, categorias c
					   WHERE p.idcategoria = c.idcategoria
					   AND p.portada = '1'
					   ORDER BY categoria ASC";
	$rpta_productos = query($sql_productos) or die(mysql_error());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script type="text/javascript">
	function borrar(cod)
	{
		con = confirm("Desea borrar este producto ?");
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
      <p>Portada de los Productos</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" action="">
<table width="850" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td colspan="4">&nbsp;</td>
            </tr>
            <tr class="tdrow1">
               <td width="182">Categoria</td>
               <td width="254">Subcategoria</td>
               <td width="157">Codigo</td>
               <td width="241">Nombre del producto</td>
            </tr>
            <?php
      		while($row = fetch_array($rpta_productos))
			{
				// subcategoria.
				$sql_dato1   = "SELECT c.categoria as subcat FROM categorias c WHERE c.idcategoria='".$row['subcategoria']."'";
				$rpta_dato1  = query($sql_dato1) or die(mysql_error());
				$fila_dato1  = fetch_array($rpta_dato1);				
				
	  ?>
            <tr class="tdrow3">
               <td class="tdrow3"><?php echo $row['categoria']; ?></td>
               <td class="tdrow2"><?php echo $fila_dato1['subcat']; ?></td>
               <td class="tdrow2"><?php echo $row['codigo_producto']; ?></td>
               <td class="tdrow2"><?php echo $row['nombre_producto']; ?></td>
            </tr>
            <?php
			}
	  ?>
         </table>
      </form>
   </div>
</div>
</body>
</html>