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

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/estilos.css"/>
<!--<script type="text/javascript" src="../js/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="../js/upload-files.js"></script>-->
<script type="text/javascript">
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
      <p>Agregar Novedad</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="procesar.php">
         <table width="860" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td width="161">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td colspan="3" class="tdrow1">
                  <?php
                  		if(isset($_GET['msg']))
						{
							if($_GET['msg']=='1')
							{
								echo '<span align="center">Ya existe el producto ingresado con su respectiva categoria.</span>';
							}
						}
				  ?>               
               </td>
            </tr>
            <tr>
               <td class="tdrow1">Titulo</td>
               <td colspan="2"><input name="titulo_novedad" type="text" class="formularios" id="titulo_novedad" size="60" /></td>
            </tr>
<!--            <tr>
               <td class="tdrow1">Nombre producto</td>
               <td colspan="2"><input name="nombre_producto" type="text" class="formularios" id="nombre_producto" size="40" /></td>
            </tr>-->
            <tr>
               <td valign="top" class="tdrow1">Imagen novedad</td>
               <td colspan="2"><input name="imagen_novedad" type="file" class="formularios" id="imagen_novedad" /></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Descripcion</td>
               <td colspan="2">
			   <?php
                $initialValue = '' ;
            
                $ckeditor = new CKEditor() ;
                $ckeditor->basePath	= '../ckeditor/';
                // Configuration that will be used only by the second editor.
                $ckeditor->config['toolbar'] = array(
                    array( 'Source','Bold', 'Italic', 'Underline','-','Cut','Copy','Paste','PasteText','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','BulletedList'),
                    array( 'Image','Link', 'Unlink')
                );	
                $ckeditor->config['skin']  = 'office2003';
                $ckeditor->config['width'] = 650;
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
               <td width="364" align="center"><input type="submit" name="button" id="boton" value="Guardar" /></td>
               <td width="323" align="center"><input type="button" value="Cancelar" id="boton" onclick="cancelar();" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>