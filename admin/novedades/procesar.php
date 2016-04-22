<?php
	
	/*
	
	$id: procesar.php.
	Subir y editar novedades.	
	Autor: Edwin Saenz Pisco.
	Fecha creacion: 2013-05-17.
	
	*/
	
	include("../../includes/conexion.php");
	include("../../includes/class.upload.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	$titulo_novedad     = $_POST['titulo_novedad'];
	$descripcion	    = $_POST['descripcion'];	
	
	if(!isset($_POST['editar'])){ #empieza el 1er if.}
	
		// Subir imagen de la novedad.
		$imagen_novedad = new upload ($_FILES['imagen_novedad']);
	
		if ($imagen_novedad->uploaded)
		{
			$imagen_novedad->image_resize         = true;									
			$imagen_novedad->image_x              = 230;
			$imagen_novedad->image_y              = 172;		
			$imagen_novedad->process('../../images/novedades/');				
			$foto_imagen_novedad = $imagen_novedad->file_dst_name;
		}
		
		// Subir imagen bg de la novedad.
		$imagen_novedad_bg = new upload ($_FILES['imagen_novedad']);
	
		if ($imagen_novedad_bg->uploaded)
		{
			$imagen_novedad_bg->image_resize         = false;										
			$imagen_novedad_bg->process('../../images/novedades/bg/');				
			$foto_imagen_novedad_bg = $imagen_novedad_bg->file_dst_name;
		}										
	
		agregar_novedades($titulo_novedad,$foto_imagen_novedad,$foto_imagen_novedad_bg,$descripcion);
	
		header("Location:index.php?ok=1$a");												

			
	} #termina el 1er if.
	
	if(isset($_POST['editar'])){
		if($_POST['editar']=='1'){				 	
			
			# editamos la foto de la novedad.
			if($_FILES['imagen_novedad']['size'] != '0')
			{				
					$handle = new upload($_FILES['imagen_novedad']);
						
					$handle->image_resize         = true;												
					$handle->image_x              = 230;
					$handle->image_y              = 172;
					$handle->process("../../images/novedades/");
					$imagen_novedad = $handle->file_dst_name;
			}
			else
			{
					$imagen_novedad = $_POST['nombreFotoNovedad'];			
			}
			
			# editamos la foto bg de la novedad.
			if($_FILES['imagen_novedad']['size'] != '0')
			{				
					$handle2 = new upload($_FILES['imagen_novedad']);
						
					$handle2->image_resize         = false;												
					$handle2->process("../../images/novedades/bg/");
					$imagen_novedad_bg = $handle2->file_dst_name;
			}
			else
			{
					$imagen_novedad_bg = $_POST['nombreFotoNovedadBg'];			
			}			
						
		
			editar_novedades($_POST['codigo'],$titulo_novedad,$imagen_novedad,$imagen_novedad_bg,$descripcion);
						
			header("Location:index.php?ok=2".$a."");								
		
		}

	}	
	

?>
