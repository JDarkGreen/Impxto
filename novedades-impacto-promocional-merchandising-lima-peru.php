<?php



	include("includes/conexion.php");

	include("includes/funciones.php");



	// definimos la variable conexion.	

	$cn = Conexion();

	

	// almacenar los banners.

	$rpta_banner = Banners();

	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css/estilos.css" />

<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />

<link rel="stylesheet" type="text/css" href="css/paginacion.css"/>

<link rel="stylesheet" type="text/css" href="css/reset.css" />

<!-- estilos skitter jquery -->

<link rel="stylesheet" type="text/css" href="css/skitter.styles.css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<!-- jquery no conflict -->

<script type="text/javascript">

$.noConflict();

</script>

<!-- skitter jquery -->

<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>

<script type="text/javascript" src="js/jquery.skitter.min.js"></script>

<script type="text/javascript" language="javascript">

	jQuery(document).ready(function($) {

		jQuery('.box_skitter_large').skitter({

			theme: 'clean',

			numbers_align: 'center',

			progressbar: true, 

			dots: true, 

			label:false,

			preview: false

		});

	});

</script>

<!-- scripts cufon --->

<script src="js/cufon-yui.js" type="text/javascript"></script>

<script src="js/Impact_400.font.js" type="text/javascript"></script>

<script type="text/javascript">



jQuery(document).ready(function($) {

	Cufon.replace('h2.tituloNovedad',{color:'#76AE1D',fontSize:'18px'});

	Cufon.replace('p.titulo',{color:'#037C8C',fontSize:'18px'});
	
	 Cufon.replace('p.fono',{color:'#037C8C',fontSize:'18px'}); 

	Cufon.replace('p.email',{color:'#000',fontSize:'18px'});

	Cufon.replace('p.tituloRedesSociales',{color:'#07B0C7',fontSize:'14px'});

/*	Cufon.replace('a.linksMenu', {

		fontSize:'18px'

	});	*/

});



jQuery(document).ready(function($){

    jQuery("#m3").addClass("activamenu");

}); 



</script>

<script type="text/javascript" src="highslide/highslide-with-gallery.js"></script>

<script type="text/javascript">

	hs.graphicsDir = 'highslide/graphics/';

	hs.align = 'center';

	hs.transitions = ['expand', 'crossfade'];

	hs.outlineType = 'rounded-white';

	hs.fadeInOut = true;

	hs.numberPosition = 'caption';

	hs.dimmingOpacity = 0.75;



	// Add the controlbar

	if (hs.addSlideshow) hs.addSlideshow({

		//slideshowGroup: 'group1',

		interval: 5000,

		repeat: false,

		useControls: true,

		fixedControls: 'fit',

		overlayOptions: {

			opacity: .75,

			position: 'bottom center',

			hideOnMouseOut: true

		}

	});

</script>

<title>

IMPACTO PROMOCIONAL SAC | NOVEDADES | articulos publicitarios, merchandising para empresas,  productos publicitarios peru| venta articulos, publicidad para empresas, impresion tazas, impresion articulos publicitarios, llaveros publicitarios peru, articulos de publicidad peru, empresa de publicidad lima, tazas publicitarias peru, thermos publicitarios, soluciones publicitarios peru, pines publicitarios peru, agencia de publicidad, estampados publicitarios, impresiones publicitarias, serigrafia publicitarias, serigrafia empresa lima peru, serigrafia y bordados publicidad, merchandising lima peru, articulos de publicidad, gorros publicitarios, polos publicitarios peru

</title>

<meta name="content-type" content="Empresa Grafica Publicitaria contamos con amplia experiencia en el area grafico publicitarios en lima Peru, impresion serigrafia merchandising por mayor y menor, tazas publicitarias, lapiceros publicitarios, gigantografias" />

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

        

        <div id="novedades">

			<h1>novedades</h1>

            <?php

				// muestro la funcion Novedades().

				$rs_novedades = Novedades();

				

			?>                                                            

        </div> <!-- empresa -->

    

    </div><!-- contenido_cuerpo -->



</div><!-- cuerpo -->



<?php

	include("includes/footer.php");

	

?>



</body>

</html>