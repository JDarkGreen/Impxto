<?php
	
	session_start();
	include("../../includes/conexion.php");
	include("../ckeditor/ckeditor.php");
	include("../ckfinder/ckfinder.php");
	include("../control.php");	
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();
	
	$sql_editar  = "SELECT * FROM productos WHERE idproducto = '".$_GET['idproducto']."'";
	$rpta_editar = query($sql_editar,$cn) or die(mysql_error());
	$fila		 = fetch_array($rpta_editar);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/ajax.js"></script>
<script type="text/javascript" src="../js/upload-files.js"></script>
<script>
	function cancelar()
	{
		document.form1.action="index.php";
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
      <p>Editar Productos</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" action="procesar.php" enctype="multipart/form-data">
         <input type = "hidden" name = "editar" id = "editar" value = "1" />
         <input type = "hidden" name = "codigo" id = "codigo" value = "<?=$_GET['idproducto']; ?>" />
         <input name = "nombreFotoPortada" type="hidden" value="<?php echo $fila['imagen_prod_portada']; ?>" />
         <input name = "nombreFotoCategoria" type="hidden" value="<?php echo $fila['imagen_prod_categorias']; ?>" />
         <input name = "nombreFotoDetalle" type="hidden" value="<?php echo $fila['imagen_prod_detalle']; ?>" />         
         <input name = "nombreFotoBg" type="hidden" value="<?php echo $fila['imagen_prod_bg']; ?>" />
         <input name = "categoria" type="hidden" value="<?php echo $_GET['categoria']; ?>" />         
         <table width="777" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td class="borde_tabla">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td width="181" class="tdrow1">Categoria</td>
               <td colspan="2"><select name="categoria" class="formularios" id="categoria" onchange="ver_subseccion(this.value);">
                     <option value="0">--Seleccione--</option>
                     <?php
            
				$padre 			= ($padre == null) ? 'IS NULL' : ' = ' . $padre;
				$sql_categoria  = "SELECT * FROM categorias WHERE idpadre ".$padre." ORDER BY categoria ASC";
				$rpta_categoria = query($sql_categoria,$cn) or die(mysql_error());
				
				while($row_categoria = fetch_array($rpta_categoria))
				{
					echo "<option value='".$row_categoria['idcategoria']."'";
					if($fila['idcategoria'] == $row_categoria['idcategoria']){	
						echo "selected";
					}
						echo ">".$row_categoria['categoria']."</option>";
				}
			
			?>
                  </select></td>
            </tr>
            <tr>
               <td class="tdrow1">Codigo</td>
               <td colspan="2"><input name="codigo_producto" type="text" class="formularios" id="codigo_producto" size="40" value="<?php echo $fila['codigo_producto']; ?>" /></td>
            </tr>
            <tr>
               <td class="tdrow1">Nombre del producto</td>
               <td colspan="2"><input name="nombre_producto" type="text" class="formularios" id="nombre_producto" size="40" value="<?php echo $fila['nombre_producto']; ?>" /></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Descripcion</td>
               <td colspan="2"><?php
                $initialValue = $fila['descripcion'];
            
                $ckeditor = new CKEditor() ;
                $ckeditor->basePath	= '../ckeditor/';
                // Configuration that will be used only by the second editor.
                $ckeditor->config['toolbar'] = array(
                    array( 'Source','Bold', 'Italic', 'Underline','-','Cut','Copy','Paste','PasteText','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','BulletedList'),
                    array( 'Image','Link', 'Unlink')
                );	
                $ckeditor->config['skin']  = 'office2003';
                $ckeditor->config['width'] = 550;
                $ckeditor->config['height'] = 250;
            
                // Just call CKFinder::SetupCKEditor before calling editor(), replace() or replaceAll()
                // in CKEditor. The second parameter (optional), is the path for the
                // CKFinder installation (default = "/ckfinder/").
                CKFinder::SetupCKEditor($ckeditor, '../ckfinder/');
                
                $ckeditor->editor('descripcion', $initialValue);
                
            ?></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Precio</td>
               <td colspan="2"><input name="precio" type="text" class="formularios" id="precio" size="20" value="<?php echo $fila['precio']; ?>" /></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">&nbsp;</td>
               <td colspan="2"><img src="../../images/productos/portada/<?php echo $fila['imagen_prod_portada']; ?>" width="143" height="101" /></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">&nbsp;</td>
               <td>&nbsp;</td>
               <td><span style="color:#000;">Titulo para el SEO</span></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Imagen Producto</td>
               <td><input name="imagen_producto" type="file" class="formularios" id="imagen_producto" /></td>
               <td><input name="imagen_tag" type="text" class="formularios" id="imagen_tag" size="40" value="<?php echo $fila['imagen_tag']; ?>" /></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">&nbsp;</td>
               <td>&nbsp;</td>
               <td>&nbsp;</td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Portada ?.</td>
               <td width="246"><input type="radio" name="portada" id="portada" value="1" 
		<?php 
        if($fila['portada']=='1')
        {
        	echo "checked='checked'";
        }
		
        ?>               
               />
Si
   <input type="radio" name="portada" id="portada" value="0" 
		<?php 
        if($fila['portada']=='0')
        {
        	echo "checked='checked'";
        }
		
        ?>   
   />
No</td>
               <td width="328" valign="top">&nbsp;</td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Titulo metatag</td>
               <td colspan="2"><textarea name="titulo_metatag" cols="50" rows="5" class="formularios" id="titulo_metatag"><?php echo $fila['titulo_metatag']; ?></textarea></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Metatag detalle</td>
               <td colspan="2"><textarea name="metatag_detalle" cols="50" rows="5" class="formularios" id="metatag_detalle"><?php echo utf8_encode($fila['metatag_detalle']); ?></textarea></td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td>&nbsp;</td>
               <td align="center"><input type="submit" name="button" id="boton" value="Guardar" /></td>
               <td align="center"><input type="button" value="Cancelar" id="boton" onclick="cancelar();" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>