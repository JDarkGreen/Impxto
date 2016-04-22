<?php

	include("includes/conexion.php");
	include("includes/funciones.php");

	// definimos la variable conexion.	
	$cn = Conexion();


	// almacenar los banners.
	$rpta_banner = Banners();

	// muestro la funcion Categorias();
	$rpta_categorias = Categorias();

	// muestro el contenido de nosotros con la funcion mostrarContenidoNosotros()
	$rpta_nosotros = mostrarContenidoNosotros();
	$row_nosotros  = fetch_array($rpta_nosotros);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/estilos.css" />
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />

<!-- estilos skitter jquery -->

<link rel="stylesheet" type="text/css" href="css/skitter.styles.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>

<!-- skitter jquery -->

<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.skitter.min.js"></script>
<script type="text/javascript" language="javascript">

	$(document).ready(function() {

		$('.box_skitter_large').skitter({

            theme: 'clean',

            numbers_align: 'center',

			interval: 5000,

            label: false,

            progressbar: true,

            navigation: false, 

            dots: true, 

			numbers: false,

            preview: false

		});

	});

</script>

<!-- scripts cufon --->

<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/Impact_400.font.js" type="text/javascript"></script>
<script type="text/javascript">



$(document).ready(function() {

	Cufon.replace('p.titulo',{color:'#037C8C',fontSize:'18px'});
	
    Cufon.replace('p.fono',{color:'#037C8C',fontSize:'18px'}); 

	Cufon.replace('p.email',{color:'#000',fontSize:'18px'});

	Cufon.replace('p.tituloRedesSociales',{color:'#07B0C7',fontSize:'14px'});

/*	Cufon.replace('a.linksMenu', {

		fontSize:'18px'

	});*/	

});



$(document).ready(function(){

    $("#m2").addClass("activamenu");

}); 



</script>
<title>IMPACTO PROMOCIONAL SAC | EMPRESA | articulos publicitarios, merchandising para empresas,  productos publicitarios peru| venta articulos promocionales, productos promocionales.empresa de merchandising en peru, empresa de articulos publicitarios, realizacion de merchandising empresarial, publicidad corporativa peru, lapiceros publicitarios lima, memorias usb publicitarios, polos publicitarios lima, globos publicitarios peru, imantados publicitarios peru, llaveros publicitarios peru, articulos de publicidad peru, empresa de publicidad lima, tazas publicitarias peru, thermos publicitarios, soluciones publicitarios peru, pines publicitarios peru, agencia de publicidad, estampados publicitarios, impresiones publicitarias, serigrafia publicitarias, serigrafia empresa lima peru, serigrafia y bordados publicidad, merchandising lima peru, articulos de publicidad, gorros publicitarios, polos publicitarios peru</title>
<meta name="content-type" content="Profesionales en el area grafica Promocional, impresiones publicitarias, serigrafia publicitarias, serigrafia empresa lima peru, serigrafia y bordados publicidad, merchandising lima peru, articulos de publicidad, baner publicitarios, pines publicitarios" />
</head>

<body>
<?php

	include("includes/header.php");

?>
<div id="cuerpo">
  <div id="contenido_cuerpo" class="limpiar">
    <?php

        	include("includes/banner.php");

		?>
	    <?php
			// campo para mostrar el contenido de nosotros.
        	echo $row_nosotros['descripcion'];

		?> 
    
  </div>
  <!-- contenido_cuerpo --> 
  
</div>
<!-- cuerpo -->

<?php

	include("includes/footer.php");

	

?>
</body>
</html>