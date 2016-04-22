<?php
	
	/*
	
	$id: procesar.php.
	editar contenido nosotros.	
	Autor: Edwin Saenz Pisco.
	Fecha creacion: 2013-05-10.
	
	*/
	
	include("../../includes/conexion.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	$descripcion	     = $_POST['descripcion'];	
	
	
	if(isset($_POST['editar']))
	{
		if($_POST['editar']=='1')
		{				 	
			editar_contenido($_POST['codigo'],$descripcion);
						
			header("Location:index.php");								
		
		}
		
	}	
	

?>
