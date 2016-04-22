<?php
	
	/*
	
	$id: procesar.php.
	Subir y editar productos con imagenes.	
	Autor: Edwin Saenz Pisco.
	Fecha creacion: 2013-08-16.
	
	*/
	
	include("../../includes/conexion.php");
	include("../../includes/class.upload.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	$idcategoria 		 = $_POST['categoria'];
	$codigo_producto	 = $_POST['codigo_producto'];
	$nombre_producto     = $_POST['nombre_producto'];
	$descripcion	     = $_POST['descripcion'];
	$precio				 = $_POST['precio'];
	$portada			 = $_POST['portada'];
	$imagen_tag			 = $_POST['imagen_tag'];
	$titulo_metatag		 = $_POST['titulo_metatag'];
	$metatag_detalle     = $_POST['metatag_detalle'];	
	
	if(!isset($_POST['editar'])){ #empieza el 1er if.}
	
		// Subir imagen producto (para la portada).
		$imagen_prod_portada = new upload ($_FILES['imagen_producto']);
	
		if ($imagen_prod_portada->uploaded)
		{
			$imagen_prod_portada->image_resize         = true;									
			$imagen_prod_portada->image_x              = 148;
			$imagen_prod_portada->image_y              = 193;		
			$imagen_prod_portada->process('../../images/productos/portada/');				
			$foto_imagen_prod_portada = $imagen_prod_portada->file_dst_name;
		}
		
		// Subir imagen producto (para el detalle).
		$imagen_prod_detalle = new upload ($_FILES['imagen_producto']);
	
		if ($imagen_prod_detalle->uploaded)
		{
			$imagen_prod_detalle->image_resize         = true;									
			$imagen_prod_detalle->image_x              = 328;
			$imagen_prod_detalle->image_y              = 382;		
			$imagen_prod_detalle->process('../../images/productos/detalle/');				
			$foto_imagen_prod_detalle = $imagen_prod_detalle->file_dst_name;
		}			
		
		// Subir imagen producto (para la imagen grande).
		$imagen_producto_bg = new upload ($_FILES['imagen_producto']);
		
		if ($imagen_producto_bg->uploaded) 
		{
			$imagen_producto_bg->image_resize   = false;						
			$imagen_producto_bg->Process('../../images/productos/bg/');
			$foto_imagen_producto_bg = $imagen_producto_bg->file_dst_name;
		}		
	
		agregar_productos($idcategoria,$codigo_producto,$nombre_producto,$descripcion,$precio,$foto_imagen_prod_portada,$foto_imagen_prod_detalle,$foto_imagen_producto_bg,$imagen_tag,$portada,$titulo_metatag,$metatag_detalle);
	
		header("Location:index.php?ok=1$a");
			
	} #termina el 1er if.
	
	if(isset($_POST['editar'])){
		if($_POST['editar']=='1'){				 	
			
			# editamos la foto del producto (portada).
			if($_FILES['imagen_producto']['size'] != '0' )
			{				
					$handle = new upload($_FILES['imagen_producto']);
						
					$handle->image_resize         = true;												
					$handle->image_x              = 148;
					$handle->image_y              = 193;
					$handle->process("../../images/productos/portada/");
					$imagen_portada_producto = $handle->file_dst_name;
			}
			else
			{
					$imagen_portada_producto = $_POST['nombreFotoPortada'];			
			}
			
			# editamos la foto del producto (detalle).
			if($_FILES['imagen_producto']['size'] != '0' )
			{				
					$handle2 = new upload($_FILES['imagen_producto']);
						
					$handle2->image_resize         = true;												
					$handle2->image_x              = 328;
					$handle2->image_y              = 382;
					$handle2->process("../../images/productos/detalle/");
					$imagen_detalle_producto = $handle2->file_dst_name;
			}
			else
			{
					$imagen_detalle_producto = $_POST['nombreFotoDetalle'];			
			}			
			
			# editamos la foto del producto (imagen bg).
			if($_FILES['imagen_producto']['size'] != '0' )
			{				
					$handle3 = new upload($_FILES['imagen_producto']);
						
					$handle3->image_resize         = false;						
					$handle3->Process('../../images/productos/bg/');
					$imagen_producto_bg = $handle3->file_dst_name;
			}
			else
			{
					$imagen_producto_bg = $_POST['nombreFotoBg'];			
			}															
					
					
			editar_productos($_POST['codigo'],$idcategoria,$codigo_producto,$nombre_producto,$descripcion,$precio,$imagen_portada_producto,$imagen_detalle_producto,$imagen_producto_bg,$imagen_tag,$portada,$titulo_metatag,$metatag_detalle);
						
			header("Location:index.php?ok=2".$a."");								
		
		}
		
		
	}	
	

?>
