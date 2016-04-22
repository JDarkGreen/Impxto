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

	Cufon.replace('p.tituloRedesSociales',{color:'#7BB41F',fontSize:'14px'});

	Cufon.replace('p.titulo3',{color:'#07B0C7',fontSize:'15px'});

/*	Cufon.replace('a.linksMenu', {

		fontSize:'18px'

	});	*/

});



jQuery(document).ready(function($){

    jQuery("#m4").addClass("activamenu");

}); 



</script>



<title>

IMPACTO PROMOCIONAL SAC | PRODUCCION | merchandising para empresas lima,  productos publicitarios peru| venta articulos, publicidad para empresas, impresion tazas, impresion articulos publicitarios, llaveros publicitarios peru, articulos de publicidad peru, empresa de publicidad lima, tazas publicitarias peru, thermos publicitarios, soluciones publicitarios peru, pines publicitarios peru, agencia de publicidad, estampados publicitarios, impresiones publicitarias, serigrafia publicitarias, serigrafia empresa lima peru, serigrafia y bordados publicidad, merchandising lima peru, articulos de publicidad, baner publicitarios, pines publicitarios

</title>

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

                </div><!-- categorias -->

                

                <div id="video"> <a href="contactenos-impacto-promocional-lima-peru.php"><img src="images/contactenos-para-mayor-informacion-lima-peru.png" width="255" height="170" /></a> 

                    <p>Producción de Impresión</p>

                </div>

            

            </div><!-- columna_izq -->

            

            <div id="columna_der">

                <h1>producción de impresión</h1>

				<?php

                	produccionVideos();

				?>                               				                                                                                                              

            

            </div><!-- columna_der -->

        

        </div> <!-- bienvenida -->

    

    </div><!-- contenido_cuerpo -->



</div><!-- cuerpo -->



<?php

	include("includes/footer.php");

	

?>



</body>

</html>