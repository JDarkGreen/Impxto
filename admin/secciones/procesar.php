<?php

	include("../../includes/conexion.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	$nombre_seccion = $_POST['nombre_seccion'];
	$url_seccion    = url_amigable($nombre_seccion);
	$estado			= $_POST['estado'];	
	
	$padre 			= ($padre == null) ? 'IS NULL' : ' = ' . $padre;
	$sql_categoria  = "SELECT * FROM categorias WHERE idpadre ".$padre." AND categoria = '".$nombre_seccion."'";
	$rpta_categoria = query($sql_categoria) or die(mysql_error());	
	$num_filas		= fetch_array($rpta_categoria);	
	
	if(!isset($_POST['editar']))
	{
		if($num_filas>0)
		{
			header("Location:agregar.php?msg=1");
		}
		else
		{
			agregar_secciones($nombre_seccion,$url_seccion,$estado);
			header("Location:index.php");			
		}
		
		
	}
	
	if(isset($_POST['editar']))
	{
		if($_POST['editar']=='1')
		{
			editar_secciones($_POST['codigo'],$nombre_seccion,$url_seccion,$estado);
			
			header("Location:index.php");
			
		}
		
	}

?>