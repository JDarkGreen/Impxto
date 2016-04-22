<?php

	include("../../includes/conexion.php");
	include("../../includes/class.upload.php");
	include("funciones.php");	
	
	$cn = Conexion();
	
	$titulo_banner = $_POST['titulo_banner'];
	
	// empieza el 1er if.
	if(!isset($_POST['editar']))
	{
		
		// Subir imagen promocion.
		$imagen_banner = new upload($_FILES['imagen_banner']);
	
		if ($imagen_banner->uploaded)
		{
			$imagen_banner->image_resize = false;		
			$imagen_banner->process('../../images/slider/');			
			$foto_imagen_banner = $imagen_banner->file_dst_name;
		}		
					
		agregar_banner($titulo_banner,$foto_imagen_banner,1);
		
		header("Location:index.php");		
		
	}
	
	if(isset($_POST['editar']))
	{
		if($_POST['editar']=='1')
		{
			
			# editamos la foto de la promocion.
			if($_FILES['imagen_banner']['size'] != '0' )
			{				
					$handle = new upload($_FILES['imagen_banner']);
						
					$handle->image_resize  = false;
					$handle->process("../../images/slider/");
					$imagen_banner = $handle->file_dst_name;
			}
			else
			{
					$imagen_banner = $_POST['nombreFoto'];			
			}			
				
			editar_banner($_POST['codigo'],$titulo_banner,$imagen_banner,1);
			
			header("Location:index.php");
				
							
		}
		
	}
	
?>