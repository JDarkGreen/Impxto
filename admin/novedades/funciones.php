<?php

	function agregar_novedades($titulo,$imagen_novedad,$imagen_novedad_bg,$detalle)
	{
		$sql_agregar  = "INSERT INTO novedades(titulo,imagen_novedad,imagen_novedad_bg,detalle)";
		$sql_agregar .= "VALUES('$titulo','$imagen_novedad','$imagen_novedad_bg','$detalle')";
		
		query($sql_agregar,$cn) or die(mysql_error());
		
		query("SET NAMES 'utf8'");
		 
	}
	
	function editar_novedades($codigo,$titulo,$imagen_novedad,$imagen_novedad_bg,$detalle)
	{
		$sql_editar  = "UPDATE novedades SET titulo = '$titulo', imagen_novedad = '$imagen_novedad',";
		$sql_editar .= "imagen_novedad_bg = '$imagen_novedad_bg', detalle = '$detalle'";
		$sql_editar .= "WHERE idnovedad = '$codigo'";
		
		query("SET NAMES 'utf8'");
		
		query($sql_editar,$cn) or die(mysql_error());
		
	}
	
	function eliminar_novedades($cod)
	{							
		$sql_borrar = "DELETE FROM novedades WHERE idnovedad = '$cod'";
		query($sql_borrar) or die(mysql_error());
		
	}

?>