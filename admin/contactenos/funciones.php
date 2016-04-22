<?php

	function editar_contenido($codigo,$descripcion)
	{
		$sql_editar  = "UPDATE contactenos SET descripcion = '$descripcion' WHERE id = '$codigo' ";
		
		query($sql_editar,$cn) or die(mysql_error());
		
	}

?>