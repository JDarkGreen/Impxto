<?php
	
	/*
	
	$id: procesar.php.
	Subir y editar produccion videos
	Autor: Edwin Saenz Pisco.
	Fecha creacion: 2013-08-19.
	
	*/
	
	// Notificar todos los errores de PHP (ver el registro de cambios)
	error_reporting(E_ALL);

	include("../../includes/conexion.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	$titulo_video       = $_POST['titulo_video'];
	$video_produccion   = $_POST['codigo_video'];
	$descripcion	    = $_POST['descripcion'];
	$portada			= $_POST['portada'];
	
	if(!isset($_POST['editar'])){ #empieza el 1er if.}							
	
		agregar_produccion_videos($titulo_video,$video_produccion,$descripcion,$portada);
	
		header("Location:index.php?ok=1");												

			
	} #termina el 1er if.
	
	if(isset($_POST['editar'])){
		if($_POST['editar']=='1'){				 				
		
			editar_produccion_videos($_POST['codigo'],$titulo_video,$video_produccion,$descripcion,$portada);
						
			header("Location:index.php?ok=2");								
		
		}

	}	

?>