<?php

	function agregar_secciones($categoria,$url_categoria,$estado)
	{
		$sql_agregar  = "INSERT INTO categorias(categoria,url_categoria,estado)";
		$sql_agregar .= "VALUES('$categoria','$url_categoria','$estado')";
		
		query($sql_agregar,$cn) or die(mysql_error());
		
	}
	
	function editar_secciones($codigo,$categoria,$url_categoria,$estado)
	{
		$sql_editar  = "UPDATE categorias SET categoria = '$categoria', url_categoria = '$url_categoria', ";
		$sql_editar .= "estado = '$estado' WHERE idcategoria = '$codigo'";
		
		query($sql_editar,$cn) or die(mysql_error());
		
	}
	
	function borrar_secciones($cod)
	{
		$sql_del = "DELETE FROM categorias WHERE idcategoria = '$cod'";
		query($sql_del,$cn) or die(mysql_error());
	
	}
	
	function url_amigable($cadena)
	{
		// Sepadador de palabras que queremos utilizar
		$separador = "-";
		// Eliminamos el separador si ya existe en la cadan actual
		$cadena = str_replace($separador, "", $cadena);
		// Remplazo tildes y e�es
		
		$cadena = strtr($cadena, array('�'=>'a', '�'=>'e', '�'=>'i', '�'=>'o', '�'=>'u'));//"������������", "aeiouAEIOUnN");
		$cadena = strtr($cadena, array('�'=>'a', '�'=>'e', '�'=>'i', '�'=>'o', '�'=>'u'));
		$cadena = strtr($cadena, array('�'=>'n', '�'=>'n'));
		// Convertimos la cadena a minusculas
		$cadena = strtolower($cadena);
		// Remplazo cuarquier caracter que no este entre A-Za-z0-9 por un espacio vacio
		$cadena = trim(ereg_replace("[^ A-Za-z0-9]", "", $cadena));
		// Inserto el separador antes definido
		$cadena = ereg_replace("[ \t\n\r]+", $separador, $cadena);
	
		return $cadena;
		
	}
	
	function cambiar_estado($idseccion)
	{
		
		$qryEstado = "SELECT * FROM categorias WHERE idcategoria ='$idseccion'";
		$rptaEstado = query($qryEstado,$cn) or die(mysql_error());
		$rowEstado = fetch_array($rptaEstado);
		
		$estado = ($rowEstado['estado']=='1')?'0':'1';
		
		//Activar-desactivar 
						
		$sql_edit = "UPDATE categorias SET estado='".$estado."' WHERE idcategoria = '$idseccion'";
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

?>