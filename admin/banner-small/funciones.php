<?php

	function agregar_banner_small($titulo,$imagen_banner_small,$estado)
	{
		$sql_agregar = "INSERT INTO banner_small(titulo,imagen_banner_small,estado)VALUES('$titulo','$imagen_banner_small','$estado')";
		
		query($sql_agregar,$cn) or die(mysql_error());
	
	}
	
	function editar_banner_small($codigo,$titulo,$imagen_banner_small,$estado)
	{
		$sql_editar  = "UPDATE banner_small SET titulo = '$titulo', imagen_banner_small = '$imagen_banner_small', estado = '$estado' WHERE idbannersmall = '$codigo'";
		
		query($sql_editar) or die(mysql_error());
		
	}
	
	function cambiar_estado($idbannersmall)
	{
		
		$qryEstado = "SELECT * FROM banner_small WHERE idbannersmall ='$idbannersmall'";
		$rptaEstado = query($qryEstado,$cn) or die(mysql_error());
		$rowEstado = fetch_array($rptaEstado);
		
		$estado = ($rowEstado['estado']=='1')?'0':'1';
		
		//Activar-desactivar 
						
		$sql_edit = "UPDATE banner_small SET estado='".$estado."' WHERE idbannersmall = '$idbanner'";
		query($sql_edit,$cn) or die(mysql_error());
		
		if($_POST['pagina']!=""){
			$pagina = $_POST['pagina'];
			$a = "&pagina=$pagina";
		}
		
		if($_GET['stUsuario']!=""){
			$b = "&stUsuario=$estado";
		}
		
		if($_POST['stUsuario']!=""){
			$b = "&stUsuario=$estado";
		}
		
		return $rptaEstado;		
		
	}	
	
	function eliminar_banner_small($cod)
	{
		$eliimage  = "SELECT * FROM banner_small WHERE idbannersmall = '$cod'";
		$rowimages = query($eliimage) or die(mysql_error());
		$rs_image  = fetch_array($rowimages);

		$fotoprincipal = $rs_image['imagen_banner_small'];
		if($fotoprincipal!="")
		{
			@unlink("../../images/slider-2/$fotoprincipal");
		}		
		
		$sql_borrar = "DELETE FROM banner_small WHERE idbannersmall = '$cod'";
		query($sql_borrar) or die(mysql_error());
		
	}

?>