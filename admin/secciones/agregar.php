<?php
	
	session_start();
	include("../../includes/conexion.php");	
	include("../control.php");	
	include("funciones.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);	
	
	// Definimos la variable de conexion.
	$cn = Conexion();	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">
	function cancelar()
	{
		document.form1.action = "index.php";
		document.form1.submit();
	}
</script>
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
         <p>Agregar Categorias</p>
         <div id="regresar_cpanel">
         	<a href="../cpanel.php">Regresar al Cpanel</a>
         </div>
      </div>
      <div id="contenido_cpanel">
         <form id="form1" name="form1" method="post" action="procesar.php">
            <table width="680" border="0" align="center" cellpadding="0" cellspacing="0">
               <tr>
                  <td>&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
               </tr>
               <tr>
                  <td colspan="3" class="tdrow1">
                  <?php
                  		if(isset($_GET['msg']))
						{
							if($_GET['msg']=='1')
							{
								echo '<span align="center">Ya existe la categoria ingresada. Ingrese otra categoria.</span>';
							}
						}
				  ?>
                  </td>
               </tr>
               <tr>
                  <td width="223" class="tdrow1">Nombre categoria</td>
                  <td colspan="2"><input name="nombre_seccion" type="text" class="texto_login" id="nombre_seccion" size="30" /></td>
               </tr>
               <tr>
                  <td class="tdrow1">Activo</td>
                  <td colspan="2"><input type="radio" name="estado" id="estado" value="1" />
                     Si
                     <input type="radio" name="estado" id="estado" value="0" />
                     No</td>
               </tr>
               <tr>
                  <td class="tdrow1">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
               </tr>
               <tr>
                  <td class="tdrow1">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
               </tr>
               <tr>
                  <td class="tdrow1">&nbsp;</td>
                  <td width="182" align="center"><input type="submit" name="button" id="boton" value="Guardar" /></td>
                  <td width="275" align="center"><input type="button" value="Cancelar" id="boton" onclick="cancelar();" /></td>
               </tr>
            </table>
         </form>
      </div>
      <div style="margin-top:25px;"></div>
   </div>
</div>
</div>
</body>
</html>