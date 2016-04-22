<?php
	include("../../includes/conexion.php");
	include("funciones.php");
	
	$cn = Conexion();
	
	if(isset($_GET['cod']))
	{	
		eliminar_produccion_videos($_GET['cod']);		
		header("Location:index.php?ok=3$a");		
		
	}
	
?>