<?php
	
	@session_start();
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
      <p>Agregar Produccion Video</p>
      <div id="regresar_cpanel"> <a href="../cpanel.php"> Regresar al Cpanel </a> </div>
   </div>
   <div id="contenido_cpanel">
      <form id="form1" name="form1" method="post" action="procesar.php">
         <table width="860" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
               <td width="177">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td class="tdrow1">Titulo Video</td>
               <td colspan="2"><input name="titulo_video" type="text" class="formularios" id="titulo_video" size="60" /></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Insertar Codigo Video</td>
               <td colspan="2"><span style="color:#000;">http://www.youtube.com/embed/ </span>
                 <input name="codigo_video" type="text" class="formularios" id="codigo_video" size="30" />
                 <br /><br /><span style="color:#000;">Ejemplo: watch?v=j2gpCTlMeXE. Copiar el codigo de referencia j2gpCTlMeXE</span></td>
            </tr>
            <tr>
               <td valign="top" class="tdrow1">Descripcion</td>
               <td colspan="2">
               	<textarea name="descripcion" id="descripcion" cols="80" rows="10"></textarea>
               </td>
            </tr>
            <tr>
              <td valign="top" class="tdrow1">Portada ?</td>
              <td colspan="2"><input name="portada" type="radio" id="portada" value="1" checked="checked" />
                Si
                <input type="radio" name="portada" id="portada" value="0" />
                No</td>
            </tr>
            <tr>
               <td class="tdrow1">&nbsp;</td>
               <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
               <td>&nbsp;</td>
               <td width="348" align="center"><input type="submit" name="button" id="boton" value="Guardar" /></td>
               <td width="323" align="center"><input type="button" value="Cancelar" id="boton" onclick="cancelar();" /></td>
            </tr>
         </table>
      </form>
   </div>
</div>
</body>
</html>