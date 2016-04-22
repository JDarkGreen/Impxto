<?php

	/* tomamos como referencia el ejemplo 2 utilizando las constantes qu han sido definidas. */
	
	/*define("SERVIDOR","localhost");
	define("USUARIO","impacto_root");
	define("CLAVE","impacto@2013");
	define("BASE_DATOS","impacto_promocional");*/
	
	define("SERVIDOR","localhost");
	define("USUARIO","root");
	define("CLAVE","");
	define("BASE_DATOS","impacto_promocional");
	
	// ruta absoluta del servidor.
	
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$base = "http://" . $host . $uri . "/";
	
	define("RUTA_SERVIDOR",$base);
	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	function Conexion()
	{
	   if (!( $cn = mysql_connect(SERVIDOR,USUARIO,CLAVE) ))
	   {
		  echo "Error conectando a la base de datos.";
		  exit();
	   }
	   if (!mysql_select_db(BASE_DATOS,$cn))
	   {
		  echo "Error seleccionando la base de datos.";
		  exit();
	   }
	   
	   mysql_query ("SET NAMES 'utf8'");
	   
	   return $cn;
	   
	}
	
	// ejecuta la query cargada en $sql.
	function query($sql)
	{
		global $cn;
		$result = mysql_query($sql,$cn) or die(mysql_error());
		return $result;
	}
	
	// retorna el numero de filas del result_set ($result)
	function fetch_array($result)
	{
		global $cn;
		$fila = mysql_fetch_array($result);
		return $fila;
	}
	
	// retorna el numero de filas del result_set ($result)
	function num_rows($result)
	{
		global $cn;
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}	

?>