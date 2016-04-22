<?php	


	function Banners()
	{
		$sql_banner  = "SELECT *FROM banner ORDER BY idbanner ASC";
		$rpta_banner = query($sql_banner) or die(mysql_error());
		
		return $rpta_banner;
		
	}

/***********************************************************************************************************************************/	
	
	function Banners_small()
	{
		$sql_banner_small  = "SELECT *FROM banner_small ORDER BY idbannersmall ASC";
		$rpta_banner_small = query($sql_banner_small) or die(mysql_error());
		
		return $rpta_banner_small;
		
	}	

/***********************************************************************************************************************************/	

	function Categorias()
	{
		$padre 			= ($padre == null) ? 'IS NULL' : ' = ' . $padre;
		$sql_categorias = "SELECT * FROM categorias WHERE idpadre ".$padre." ORDER BY categoria ASC";
		$rpta_categoria = query($sql_categorias,$cn) or die(mysql_error());

		return $rpta_categoria;
		
	}

/***********************************************************************************************************************************/	

	function portadaProductos($categoria)
	{
		
		$registros = 9;
		$pagina    = $_GET['pagina'];

		if (!$pagina) { 
			$inicio = 0; 
			$pagina = 1; 
		}else{ 
			$inicio = ($pagina - 1) * $registros; 
		}		

		# categoria del producto.

		if($_GET['idcategoria']!="")
		{
			$condicion .= "AND p.idcategoria = '".$_GET['idcategoria']."'";
			$a = "&idcategoria=".$_GET['idcategoria']."";

		}

		# si la categoria es igual al vacio.
		
		if($_GET['idcategoria']=="")
		{
			$condicion .= "AND p.portada = '1'";
			$a = "";
		}

		# Primera consulta.
		
		$sql_productos   = "SELECT p . * , c . * FROM productos p, categorias c
							WHERE p.idcategoria = c.idcategoria 
							".$condicion." ";	
		$rpta_productos  = query($sql_productos,$cn) or die(mysql_error());
		$total_registros = num_rows($rpta_productos);

		# Segunda consulta.
		$sql_portada_prod = "SELECT p . * , c . * FROM productos p, categorias c
							 WHERE p.idcategoria = c.idcategoria 
							 ".$condicion." 
							 ORDER BY idproducto DESC LIMIT $inicio, $registros";
		$rs_portada_prod  = query($sql_portada_prod,$cn) or die(mysql_error());
		$num_registros 	  = num_rows($rs_portada_prod);
		$total_paginas    = ceil($total_registros / $registros);							

		if($num_registros>0)
		{		
			while($row_portada = fetch_array($rs_portada_prod))
			{
				
				echo '
				 <div class="cuadro">
					<div class="cuadro-imagen">
						<a onclick="return hs.expand(this, { slideshowGroup: 2 } )" class="highslide" href="images/productos/bg/'.$row_portada['imagen_prod_bg'].'">
							<img border="0" alt="" src="images/productos/portada/'.$row_portada['imagen_prod_portada'].'">
						</a>
						<div class="highslide-caption">
							'.$row_portada['nombre_producto'].'
						</div> 						
					</div>
					<div style="clear: both; height: 54px; margin:0 auto; width:210px;">
						<div class="cuadro-nombre">'.ucfirst($row_portada['nombre_producto']).' </div>
						<div class="cuadro-nombre-categoria">'.$row_portada['categoria'].' </div>                             
						<div style="float:left; height:auto; width: 177px;">
							<div class="cuadro-titulo">Cod: <span>'.$row_portada['codigo_producto'].'</span> </div>
						</div>
					</div>
					<div style="clear: both; height: auto; margin:0 auto; padding-left:5px; width:204px;">
						<div class="cuadro-botones">
							<div class="btn-solicitar"><a href="producto-detalle-impacto-promocional-lima-peru.php?idproducto='.$row_portada['idproducto'].'&idcategoria='.$row_portada['idcategoria'].'">Cotizar</a></div>                
							<div class="btn-detalles"><a href="producto-detalle-impacto-promocional-lima-peru.php?idproducto='.$row_portada['idproducto'].'&idcategoria='.$row_portada['idcategoria'].'">Detalles</a></div>
						</div>
					</div>
				 </div>
				  		
				';
				
			}			

		}
		else
		{

			echo '
			<div style="height:678px; width:753px; text-align:center;">
				No hay productos registrados.
			</div>
			';	

		}
		
		echo '<div class="clear"></div>';

		echo '<div style="float:left; height:auto; width:753px;">';

		echo "<div id = \"pag\">";

		#pregunto si hay resultados para paginar.

		mysql_free_result($rs_portada_prod);				

		if($total_registros) 
		{

			if(($pagina - 1) > 0) 
			{
				echo "<a href=\"index.php?pagina=".($pagina-1).$a."\" rel=\"nofollow\">< </a>";

			}


			for ($i=1; $i<=$total_paginas; $i++)
			{ 

				if ($pagina == $i) 
				{
					echo "<a class='sel' href = 'javascript:void(0);' rel=\"nofollow\">".$pagina."</a>";
				} 
				else 
				{
					echo "<a href=\"index.php?pagina=$i".$a."\" rel=\"nofollow\">".$i."</a>";

				}	

			}


			if(($pagina + 1)<=$total_paginas) 
			{
				echo "<a href=\"index.php?pagina=".($pagina+1).$a."\" rel=\"nofollow\"> > </a>";
			}
		

		}
		else
		{

		}

		echo "</div>";		
		
		echo '</div>';		
		
	}
	
/***********************************************************************************************************************************/

	function Novedades()
	{
		
		$registros = 6;
		$pagina    = $_GET['pagina'];

		if (!$pagina) { 
			$inicio = 0; 
			$pagina = 1; 
		}else{ 
			$inicio = ($pagina - 1) * $registros; 
		}		

		# Primera consulta.
		$sql_novedad     = "SELECT idnovedad FROM novedades";	
		$rpta_novedad    = query($sql_novedad,$cn) or die(mysql_error());
		$total_registros = num_rows($rpta_novedad);

		# Segunda consulta.
		$sql_novedades = "SELECT * FROM novedades ORDER BY idnovedad DESC LIMIT $inicio, $registros";
		$rs_novedades  = query($sql_novedades,$cn) or die(mysql_error());
		$num_registros = num_rows($rs_novedades);
		$total_paginas = ceil($total_registros / $registros);							

		if($num_registros>0)
		{		
			while($row_novedades = fetch_array($rs_novedades))
			{
				
				echo '
					<div id="lista_novedades">
						<a onclick="return hs.expand(this, { slideshowGroup: 2 } )" class="highslide" href="images/novedades/bg/'.$row_novedades['imagen_novedad_bg'].'">
							<img src="images/novedades/'.$row_novedades['imagen_novedad'].'" width="230" height="172" style="float:left; padding-left: 9px;" />
						</a>
						<div class="highslide-caption">
							'.$row_novedades['titulo'].'
						</div>						
						<h2 class="tituloNovedad">'.$row_novedades['titulo'].'</h2>
						'.$row_novedades['detalle'].'
					</div>
				  		
				';
				
			}			

		}
		else
		{

			echo '
			<div style="height:678px; width:753px; text-align:center;">
				No hay novedades registradas.
			</div>
			';	

		}
		
		echo '<div class="clear"></div>';

		echo '<div style="float:left; height:auto; width:753px;">';

		echo "<div id = \"pag\">";

		#pregunto si hay resultados para paginar.

		mysql_free_result($rs_novedades);				

		if($total_registros) 
		{

			if(($pagina - 1) > 0) 
			{
				echo "<a href=\"novedades-impacto-promocional-merchandising-lima-peru.php?pagina=".($pagina-1)."\" rel=\"nofollow\">< </a>";

			}


			for ($i=1; $i<=$total_paginas; $i++)
			{ 

				if ($pagina == $i) 
				{
					echo "<a class='sel' href = 'javascript:void(0);' rel=\"nofollow\">".$pagina."</a>";
				} 
				else 
				{
					echo "<a href=\"novedades-impacto-promocional-merchandising-lima-peru.php?pagina=$i\" rel=\"nofollow\">".$i."</a>";

				}	

			}


			if(($pagina + 1)<=$total_paginas) 
			{
				echo "<a href=\"novedades-impacto-promocional-merchandising-lima-peru.php?pagina=".($pagina+1)."\" rel=\"nofollow\"> > </a>";
			}
		

		}
		else
		{

		}

		echo "</div>";		
		
		echo '</div>';		
		
	}

/***********************************************************************************************************************************/

	function produccionVideos()
	{
		
		$registros = 6;
		$pagina    = $_GET['pagina'];

		if (!$pagina) { 
			$inicio = 0; 
			$pagina = 1; 
		}else{ 
			$inicio = ($pagina - 1) * $registros; 
		}		

		# Primera consulta.
		$sql_produccion   = "SELECT idvideo FROM produccion_video";	
		$rpta_produccion  = query($sql_produccion,$cn) or die(mysql_error());
		$total_registros  = num_rows($rpta_produccion);

		# Segunda consulta.
		$sql_prod_impresion = "SELECT * FROM produccion_video ORDER BY idvideo DESC LIMIT $inicio, $registros";
		$rs_prod_impresion  = query($sql_prod_impresion,$cn) or die(mysql_error());
		$num_registros 	    = num_rows($rs_prod_impresion);
		$total_paginas      = ceil($total_registros / $registros);							

		if($num_registros>0)
		{		
			while($row_produccion = fetch_array($rs_prod_impresion))
			{
				echo '
					<div class="cuadro-video">
					
						<div class="titulo-video">
							<p class="titulo3">'.$row_produccion['titulo'].'</p>
						</div><!-- titulo-video -->
						
						<div class="video">
							<iframe width="330" height="218" src="http://www.youtube.com/embed/'.$row_produccion['video_produccion'].'" frameborder="0" allowfullscreen></iframe>                 
						</div><!-- video -->
						
						<div class="descrip_video">
							<p>'.$row_produccion['detalle_video'].'</p>
						</div><!-- descrip_video -->
					
					</div><!-- cuadro-video -->
				  		
				';
				
			}			

		}
		else
		{

			echo '
			<div style="height:678px; width:753px; text-align:center;">
				No hay producciones de videos registrados.
			</div>
			';	

		}
		
		echo '<div class="clear"></div>';

		echo '<div style="float:left; height:auto; width:753px;">';

		echo "<div id = \"pag\">";

		#pregunto si hay resultados para paginar.

		mysql_free_result($rs_prod_impresion);				

		if($total_registros) 
		{

			if(($pagina - 1) > 0) 
			{
				echo "<a href=\"produccion-impacto-promocional-lima-peru.php?pagina=".($pagina-1)."\" rel=\"nofollow\">< </a>";

			}


			for ($i=1; $i<=$total_paginas; $i++)
			{ 

				if ($pagina == $i) 
				{
					echo "<a class='sel' href = 'javascript:void(0);' rel=\"nofollow\">".$pagina."</a>";
				} 
				else 
				{
					echo "<a href=\"produccion-impacto-promocional-lima-peru.php?pagina=$i\" rel=\"nofollow\">".$i."</a>";

				}	

			}

			if(($pagina + 1)<=$total_paginas) 
			{
				echo "<a href=\"produccion-impacto-promocional-lima-peru.php?pagina=".($pagina+1)."\" rel=\"nofollow\"> > </a>";
			}
		

		}
		else
		{

		}

		echo "</div>";		
		
		echo '</div>';		
		
	}

/***********************************************************************************************************************************/

	function portadaVideos()
	{		

		# Primera consulta.
		$sql_produccion   = "SELECT * FROM produccion_video WHERE portada = '1' ORDER BY portada DESC";	
		$rpta_produccion  = query($sql_produccion,$cn) or die(mysql_error());					
			
		return $rpta_produccion;
				
		
	}	

/***********************************************************************************************************************************/		

	function tituloCat($categoria)
	{

		# subcategoria del producto.
		if($_GET['idcategoria']!="")
		{
			$condicion .= "WHERE idcategoria = '".$_GET['idcategoria']."'";
		}		

		$sql_titcategoria  = "SELECT idcategoria, categoria FROM categorias ".$condicion."";
		$rpta_titcategoria = query($sql_titcategoria,$cn) or die(mysql_error());

		return $rpta_titcategoria;			


	}

/***********************************************************************************************************************************/

	function DetalleProducto($idproducto)
	{

		$sql_producto  = "SELECT c. * , p. * FROM categorias c, productos p
						  WHERE c.idcategoria = p.idcategoria 
						  AND idproducto = '$idproducto'";
		$rpta_producto = query($sql_producto,$cn) or die(mysql_error());
		
		return $rpta_producto;

	}
	
/***********************************************************************************************************************************/


	function agregarSuscritos($nombres,$email,$estado)	
	{
		$sql_agregar  = "INSERT INTO suscriptores(nombres,email,estado)VALUES('$nombres','$email','$estado')";
		$sql_agregar .= query($sql_agregar) or die(mysql_error());
		
	}

	
/***********************************************************************************************************************************/

	function agregarPedidoProducto($idproducto,$nombres,$email,$telefono,$direccion,$cantidad,$mensaje)
	{
		
		$sql_agregar  = "INSERT INTO pedidos(idproducto,nombres,email,telefono,direccion,cantidad,mensaje)";
		$sql_agregar .= "VALUES('$idproducto','$nombres','$email','$telefono','$direccion','$cantidad','$mensaje')";
		
		query($sql_agregar) or die(mysql_error());
		
	}
	
/***********************************************************************************************************************************/

	function mostrarContenidoNosotros()
	{
		$sql_nosotros  = "SELECT * FROM nosotros";
		$rpta_nosotros = query($sql_nosotros) or die(mysql_error());
		
		return $rpta_nosotros;
			
	}
	
/***********************************************************************************************************************************/
	
	function mostrarContenidoContactenos()
	{
		$sql_contactenos  = "SELECT * FROM contactenos";
		$rpta_contactenos = query($sql_contactenos) or die(mysql_error());
		
		return $rpta_contactenos;
			
	}	

?>