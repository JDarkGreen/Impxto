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
	
	$sql_editar  = "SELECT * FROM contactenos WHERE id = '".$_GET['id']."'";
	$rpta_editar = query($sql_editar,$cn) or die(mysql_error());
	$fila		 = fetch_array($rpta_editar);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
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
      <p>Editar nosotros</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" action="procesar.php" enctype="multipart/form-data">
         <input type = "hidden" name = "editar" id = "editar" value = "1" />
         <input type = "hidden" name = "codigo" id = "codigo" value = "<?=$_GET['id']; ?>" />         
         <table width="777" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td width="181" class="borde_tabla">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Descripcion</td>
               <td colspan="2">
			   <?php
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
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td>&nbsp;</td>
               <td width="246" align="center"><input type="submit" name="button" id="boton" value="Guardar" /></td>
               <td width="328" align="center"><input type="button" value="Cancelar" id="boton" onclick="cancelar();" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>