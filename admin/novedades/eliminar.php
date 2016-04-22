<?php
	include("../../includes/conexion.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	if(isset($_GET['cod']))
	{	
		eliminar_novedades($_GET['cod']);		
		header("Location:index.php?ok=3$a");		
		
	}
	
?>