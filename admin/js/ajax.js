function ver_subseccion(dato)
{
	$.ajax({ 
		url: "subseccion.php?idpadre="+dato,
		type: "GET",
		success: function(data){	
			$('#subseccion').fadeOut("slow",function(){
				$('#subseccion').html(data);
			});
			$('#subseccion').fadeIn("slow"); 			
		}
	});	
	
}
	

