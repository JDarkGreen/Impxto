<?php



	include("includes/conexion.php");

	include("includes/funciones.php");



	// definimos la variable conexion.	

	$cn = Conexion();

	

	// almacenar los banners.

	$rpta_banner = Banners();	



	// muestro la funcion Categorias();

	$rpta_categorias = Categorias();



	//  muestro el titulo de la subcategoria del producto.

	$rpta_titcat   = tituloCat($_GET['idcategoria']);

	$row_titcat	   = fetch_array($rpta_titcat);

	$tit_categoria = ($_GET['idcategoria']=='')?'Productos destacados / promociones':$row_titcat['categoria'];
	
	// muestro el video de la producción.
	$rpta_produccion = portadaVideos();
	$row_produccion  = fetch_array($rpta_produccion);	

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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>

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

			preview: true

		});

	});

</script>
<script type="text/javascript">

jQuery(document).ready(function($) {



//When mouse rolls over

  jQuery('#categorias li a').hover(function($) {

    jQuery(this).animate( {marginLeft: "15px"}, {queue: false, duration: 'fast'} );



  }, function() {

    jQuery(this).animate( {marginLeft: "-1px"}, {queue: false, duration: 'fast'} );  



    });



  }); // end of document ready

</script>

<!-- scripts cufon --->

<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/Impact_400.font.js" type="text/javascript"></script>
<script type="text/javascript">



jQuery(document).ready(function($) {

	Cufon.replace('p.titulo',{color:'#037C8C',fontSize:'18px'});
	
    Cufon.replace('p.fono',{color:'#037C8C',fontSize:'18px'}); 
	
	Cufon.replace('p.email',{color:'#000',fontSize:'18px'});

	Cufon.replace('p.tituloRedesSociales',{color:'#07B0C7',fontSize:'14px'});

	/*Cufon.replace('a.linksMenu', {

		fontSize:'18px'

	});	*/

});



jQuery(document).ready(function($){

    jQuery("#m1").addClass("activamenu");

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
<title>IMPACTO PROMOCIONAL SAC | INICIO | articulos publicitarios, marchandising para empresas, articulos para promocionar, publicidad y merchandising peru, serigrafia merchandising peru, impresiones para merchandising, articulos merchandising peru lima, impacto diseño publicitarios, llaveros publicitarios peru, lapiceros publicidad lima, empresa de publicidad, merchandising peru, lapiceros publicidad, pines publicidad, marchandising articulos lima, vasos publicitarios, tazas publicitarias, print art peru, print arte peru lima, articulos de publicidad lima, la marca en tus articulos, publicidad para empresas, calidad en articulos de impresion lima, la mejor empresa de publicidad peru</title>
<meta name="content-type" content="Impacto Promocional empresa peruana dedicada a la fabricación y comercialización de artículos promocionales, merchandising y afines. Contamos con amplia experiencia en el area grafico publicitarios en lima Peru" />
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
    <div id="bienvenida">
      <div id="columna_izq">
        <div id="categorias">
          <h1>catalogo</h1>
          <ul>
            <?php

                            while($row_categoria = fetch_array($rpta_categorias))

                            {

                        ?>
            <li><a href="index.php?idcategoria=<?php echo $row_categoria['idcategoria']?>"><?php echo ucfirst($row_categoria['categoria']); ?></a></li>
            <?php

                            }

                            

                        ?>
          </ul>
        </div>
        <!-- categorias -->
        
        <div id="video"> 
			<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FIMPACTOPROMOCIONAL&amp;width=260&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=true&amp;appId=1444584859098602" scrolling="no" frameborder="0" style="background:#FFF; border:none; overflow:hidden; width:260px; height:590px;" allowTransparency="true"></iframe>
        </div>        
        
        <div id="portada_video"> 
			<iframe width="255" height="169" src="//www.youtube.com/embed/<?php echo $row_produccion['video_produccion']; ?>" frameborder="0" allowfullscreen></iframe>
        </div>
        
      </div>
      <!-- columna_izq -->
      
      <div id="columna_der">
        <h1><?php echo strtoupper($tit_categoria); ?></h1>
        <?php

                    $categoria = ($_GET['idcategoria']=='')?$categoria:'';

                    portadaProductos($categoria);

                    

                ?>
      </div>
      <!-- columna_der --> 
      
    </div>
    <!-- bienvenida --> 
    
  </div>
  <!-- contenido_cuerpo --> 
  
</div>
<!-- cuerpo -->

<?php

	include("includes/footer.php");

	

?>
</body>
</html>