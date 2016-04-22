<?php

	function agregar_produccion_videos($titulo_video,$video_produccion,$detalle_video,$portada)
	{
		$sql_agregar  = "INSERT INTO produccion_video(titulo_video,video_produccion,detalle_video,portada)";
		$sql_agregar .= "VALUES('$titulo_video','$video_produccion','$detalle_video','$portada')";
		
		query($sql_agregar) or die(mysql_error());
		 
	}
	
	function editar_produccion_videos($codigo,$titulo_video,$video_produccion,$detalle_video,$portada)
	{
		$sql_editar  = "UPDATE produccion_video SET titulo_video = '$titulo_video', ";
		$sql_editar .= "video_produccion = '$video_produccion', detalle_video = '$detalle_video', portada = '$portada'";
		$sql_editar .= "WHERE idvideo = '$codigo'";
		
		query($sql_editar) or die(mysql_error());
		
	}
	
	function eliminar_produccion_videos($cod)
	{							
		$sql_borrar = "DELETE FROM produccion_video WHERE idvideo = '$cod'";
		query($sql_borrar) or die(mysql_error());
		
	}
	
	function autolink($string)
	{
		// force http: on www.
		$string = str_ireplace( "www.", "http://www.", $string );
		// eliminate duplicates after force
		$string = str_ireplace( "http://http://www.", "http://www.", $string );
		$string = str_ireplace( "https://http://www.", "https://www.", $string );
	
		// The Regular Expression filter
		$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
		// Check if there is a url in the text
	
		$m = preg_match_all($reg_exUrl, $string, $match); 
	
		if ($m) 
		{ 
			$links=$match[0]; 
			for ($j=0;$j<$m;$j++) 
			{ 
		
				if(substr($links[$j], 0, 18) == 'http://www.youtube')
				{
			
					$string=str_replace($links[$j],'<a href="'.$links[$j].'" rel="nofollow" target="_blank">'.$links[$j].'</a>',$string).'<br /><iframe title="YouTube video player" class="youtube-player" type="text/html" width="320" height="185" src="http://www.youtube.com/embed/'.substr($links[$j], -11).'" frameborder="0" allowFullScreen></iframe><br />';
				}
				else
				{
					$string=str_replace($links[$j],'<a href="'.$links[$j].'" rel="nofollow" target="_blank">'.$links[$j].'</a>',$string);
			
				} 
		
			}
			 
		} 
	
	}

?>