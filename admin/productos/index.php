<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../control.php");	
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();
	
	if($_POST['categorias']!="" )
	{
		$categorias = $_POST['categorias'];
		$condicion .= "AND p.idcategoria = '".$categorias."'";
	}
	
	$sql_productos  = "SELECT p. * , c. * FROM productos p, categorias c
					   WHERE p.idcategoria = c.idcategoria 
					   ".$condicion." 
					   ORDER BY categoria, idproducto ASC";
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
	
	function buscar()
	{
		document.form1.action = "index.php";
		document.form1.submit();
		
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
      <p>Productos</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" action="">
         <table width="850" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
               <td colspan="3" align="center">&nbsp;</td>
            </tr>
            <tr>
               <td colspan="3" align="center"><a href="agregar.php">Agregar productos</a></td>
            </tr>
            <tr>
               <td colspan="3" align="center">&nbsp;</td>
            </tr>
            <tr>
               <td width="107" class="tdrow1">Categoria: 
               </td>
               <td width="153" class="tdrow1"><select name="categorias" id="categorias">
                  <option value="">--seleccione-</option>
                  <?php
						$padre 			= ($padre == null) ? 'IS NULL' : ' = ' . $padre;
						$sql_categoria  = "SELECT * FROM categorias WHERE idpadre ".$padre." ORDER BY categoria ASC";
						$rpta_categoria = query($sql_categoria,$cn) or die(mysql_error());
						
						while($row_categoria = fetch_array($rpta_categoria))
						{
							echo "<option value='".$row_categoria['idcategoria']."'>".$row_categoria['categoria']."</option>";
						}                    
					
					?>
               </select></td>
               <td width="590" class="tdrow1"><input name="button" type="button" class="boton" value="Buscar" onclick="buscar(); "/></td>
            </tr>
         </table>
         <table width="850" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td colspan="5">&nbsp;</td>
               <td width="55">&nbsp;</td>
               <td width="78">&nbsp;</td>
            </tr>
            <tr class="tdrow1">
               <td width="29">No</td>
               <td width="81">Imagen</td>
               <td width="137">Categoria</td>
               <td width="163">Codigo del producto</td>
               <td width="279">Nombre del producto</td>
               <td>Editar</td>
               <td>Eliminar</td>
            </tr>
            <?php
			$i = 1;
      		while($row = fetch_array($rpta_productos))
			{
				 if($c==1){ $color='#FFFFFF'; $c=2;} else { $color='#F3F3F3'; $c=1;}
				// subcategoria.
				$sql_dato1   = "SELECT c.categoria as subcat FROM categorias c WHERE c.idcategoria='".$row['subcategoria']."'";
				$rpta_dato1  = query($sql_dato1) or die(mysql_error());
				$fila_dato1  = fetch_array($rpta_dato1);				
				
	  ?>
            <tr bgcolor="<?php echo $color; ?>">
               <td class="tdrow2"><?php echo $i; ?></td>
               <td class="tdrow2"><img src="../../images/productos/portada/<?php echo $row['imagen_prod_portada']; ?>" width="40" height="37" /></td>
               <td class="tdrow2"><?php echo $row['categoria']; ?></td>
               <td class="tdrow2"><?php echo $row['codigo_producto']; ?></td>
               <td class="tdrow2"><?php echo $row['nombre_producto']; ?></td>
               <td align="center" class="tdrow2"><a href="editar.php?idproducto=<?php echo $row['idproducto']; ?>&categoria=<?php echo $row['idcategoria']; ?>"><img src="../imagenes/application_form_edit.png" width="16" height="16" border="0" /></a></td>
               <td align="center" class="tdrow2"><img src="../imagenes/application_form_delete.png" width="16" height="16" onclick="borrar('<?php echo $row['idproducto']; ?>');" style="cursor:pointer;"/></td>
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