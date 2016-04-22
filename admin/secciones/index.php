<?php
	
	session_start();
	include("../../includes/conexion.php");	
	include("../control.php");
	
	// definimos la funcion control_session.
	control_session($_SESSION['admin_admin']);
	
	// Definimos la variable de conexion.
	$cn = Conexion();
	
	$padre = ($padre == null) ? 'IS NULL' : ' = ' . $padre;
	$sql_secciones  = "SELECT * FROM categorias WHERE idpadre ".$padre." ORDER BY categoria ASC";
	$rpta_secciones = query($sql_secciones,$cn) or die(mysql_error());

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript">

	function borrar(cod){
		con = confirm("Desea borrar la seccion ?");
			if(con==true){
				document.form1.action = "eliminar.php?cod="+cod;
				document.form1.submit();
			}
	}

	function changeState2(url,est,mssg)
	{
		if(est==1){		
			message = "quieres desactivar esta "+mssg+" ?";
		}else{
			message = "quieres activar esta "+mssg+" ?";
		}
		if(confirm(message)){
			document.form1.action='estado.php?estado=1&'+url;
			document.form1.submit();	
		}
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
         <p>Categorias</p>
         <div id="regresar_cpanel">
             <a href="../cpanel.php">
                Regresar al Cpanel
             </a>
         </div>         
      </div>
      <div id="contenido_cpanel">
        <form id="form1" name="form1" method="post">
          <table width="820" border="0" align="center" cellpadding="2" cellspacing="2">
            <tr>
              <td align="center"><a href="agregar.php">Agregar categoria</a></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
            </tr>
          </table>
          <table width="820" border="0" align="center" cellpadding="2" cellspacing="0">
            <tr>
        <!--      <td width="200">Marca</td>-->
              <td width="336" class="tdrow1">Nombre categoria</td>
              <td width="185" align="center" class="tdrow1">Estado</td>
              <td align="center" class="tdrow1">Editar</td>
              <td align="center" class="tdrow1">Eliminar</td>
            </tr>
            <?php
                while($row_secciones = fetch_array($rpta_secciones))
                {
          ?>
            <tr>
              <!--<td valign="top"><?php//echo $row_secciones['nombre_marca']; ?></td>-->
              <td valign="top" class="tdrow3"><?php echo $row_secciones['categoria']; ?></td>
              <td valign="top" class="tdrow3"><?php if($row_secciones['estado']==1){ ?>
                 
                 <div align="center"> <a href="javascript:changeState2('idcategoria=<?=$row_secciones['idcategoria']; ?>&amp;stUsuario=<?=$row_secciones['estado']?>',<?=$row_secciones['estado']?>,'seccion')"> <img src="../imagenes/accept.png" alt="Producto destacado" title="Producto destacado" width="14" height="14" border="0" /> </a> </div>
   <?php
                    }
                ?>
                 <?php if($row_secciones['estado']==0){ ?>
                 
                 <div align="center"> <a href="javascript:changeState2('idseccion=<?=$row_secciones['idcategoria']; ?>&amp;stUsuario=<?=$row_secciones['estado']?>',<?=$row_secciones['estado']?>,'seccion')"> <img src="../imagenes/no-accept.png" alt="Producto no destacado" title="Producto no destacado" width="16" height="16" border="0" /></a></div><?php } ?></td>
              <td width="73" align="center" valign="top" class="tdrow3"><a href="editar.php?id=<?php echo $row_secciones['idcategoria']; ?>"><img src="../imagenes/application_form_edit.png" width="16" height="16" border="0" /></a></td>
              <td width="79" align="center" valign="top" class="tdrow3"><img src="../imagenes/application_form_delete.png" width="16" height="16" onclick="borrar('<?php echo $row_secciones['idcategoria']; ?>')" style="cursor:pointer;" /></td>
            </tr>
            <?php
                }
                
          ?>
          </table>
        </form>
      </div>
      <div style="margin-top:25px;"></div>
   </div>
</div>
</div>
</body>
</html>