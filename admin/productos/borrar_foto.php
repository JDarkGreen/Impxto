<?php

	/*
	
		$id: borrar_foto.php
		Autor: Edwin Saenz Pisco.
		Fecha creacion: 2013-03-25.
	
	*/

		include("../../includes/conexion.php");

		// definimos la variable conexion.	
		$cn = Conexion();
		
		$sql_archivo = "SELECT * FROM galeria_productos WHERE idgaleria = '".$_GET['idfoto']."'";
		$rowarchivo = query($sql_archivo,$cn) or die(mysql_error());
		$rs_archivo = fetch_array($rowarchivo);
		$foto1 = $rs_archivo['imagen'];
		
		if($foto1!=""){
			@unlink("../../images/productos/detalle_prod/$foto1");
		}
		
		$foto2 = $rs_archivo['imagen_thb'];
		
		if($foto2!=""){
			@unlink("../../images/productos/detalle_prod/thb/$foto2");
		}		
		
		$sql_del = "DELETE FROM galeria_productos WHERE idgaleria = '".$_GET['idfoto']."'";
		query($sql_del,$cn) or die(mysql_error());		
		
		header("Location:editar.php?idproducto=$rs_archivo[idproducto]&categoria=$rs_archivo[idcategoria]&subcategoria=$rs_archivo[idsubcategoria]");
		
				
?>
