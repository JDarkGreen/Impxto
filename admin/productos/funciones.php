<?php

	function agregar_productos($idcategoria,$codigo_producto,$nombre_producto,$precio,$descripcion,$imagen_prod_portada,$imagen_prod_detalle,$imagen_prod_bg,$imagen_tag,$portada,$titulo_metatag,$metatag_detalle)
	{
		$sql_agregar  = "INSERT INTO productos(idcategoria,codigo_producto,nombre_producto,precio,descripcion,imagen_prod_detalle,";
		$sql_agregar .= "imagen_prod_portada,imagen_prod_bg,imagen_tag,portada,titulo_metatag,metatag_detalle)";
		$sql_agregar .= "VALUES('$idcategoria','$codigo_producto','$nombre_producto','$descripcion','$precio',";
		$sql_agregar .= "'$imagen_prod_portada','$imagen_prod_detalle','$imagen_prod_bg','$imagen_tag','$portada','$titulo_metatag','$metatag_detalle')";
		
		query($sql_agregar,$cn) or die(mysql_error());
		 
	}
	
	function editar_productos($codigo,$idcategoria,$codigo_producto,$nombre_producto,$precio,$descripcion,$imagen_prod_portada,$imagen_prod_detalle,$imagen_prod_bg,$imagen_tag,$portada,$titulo_metatag,$metatag_detalle)
	{
		$sql_editar  = "UPDATE productos SET idcategoria = '$idcategoria', codigo_producto = '$codigo_producto', ";
		$sql_editar .= "nombre_producto = '$nombre_producto', descripcion = '$descripcion', precio = '$precio', ";
		$sql_editar .= "imagen_prod_portada = '$imagen_prod_portada', imagen_prod_detalle = '$imagen_prod_detalle' ,imagen_prod_bg = '$imagen_prod_bg', imagen_tag = '$imagen_tag', ";
		$sql_editar .= "portada = '$portada', titulo_metatag = '$titulo_metatag', metatag_detalle = '$metatag_detalle' ";
		$sql_editar .= "WHERE idproducto = '$codigo'";
		
		query($sql_editar,$cn) or die(mysql_error());
		
	}
	
	function eliminar_productos($cod)
	{
		
		$eliimage  = "SELECT * FROM productos WHERE idproducto = '$cod'";
		$rowimages = query($eliimage) or die(mysql_error());
		$rs_image  = fetch_array($rowimages);

		// borrar imagen de la portada del producto.
		$fotoprincipal = $rs_image['imagen_prod_portada'];
		if($fotoprincipal!="")
		{
			@unlink("../../images/productos/portada/$fotoprincipal");
		}
		
		// borrar imagen del detalle del producto.
		$fotoprincipal = $rs_image['imagen_prod_detalle'];
		if($fotodetalle!="")
		{
			@unlink("../../images/productos/detalle/$fotodetalle");
		}			
		
		// borrar la imagen grande del producto.
		$foto_bg = $rs_image['imagen_prod_bg'];
		if($foto_bg!="")
		{
			@unlink("../../images/productos/bg/$foto_bg");
		}			
		
		$sql_borrar = "DELETE FROM productos WHERE idproducto = '$cod'";
		query($sql_borrar) or die(mysql_error());
		
	}
	
		

?>