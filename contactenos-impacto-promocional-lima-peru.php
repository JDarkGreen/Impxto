<?php

	include("includes/conexion.php");
	include("includes/funciones.php");


	// definimos la variable conexion.	
	$cn = Conexion();

	// almacenar los banners.
	$rpta_banner = Banners();
	
	// muestro el contenido de contáctenos con la funcion mostrarContenidoNosotros()
	$rpta_contactenos = mostrarContenidoContactenos();
	$row_contactenos  = fetch_array($rpta_contactenos);	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/estilos.css" />
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/validador.css" />

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

            dots: false, 

			numbers: false,

            preview: false

		});

	});

</script>

<!--  jquery validate engine --->

<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
<script src="js/jquery.validationEngine-es.js" type="text/javascript"></script>
<script src="js/validar_formulario.js" type="text/javascript"></script>

<!-- scripts cufon --->

<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/Impact_400.font.js" type="text/javascript"></script>
<script type="text/javascript">



$(document).ready(function() {

	Cufon.replace('p.titulo',{color:'#037C8C',fontSize:'18px'});
	
	 Cufon.replace('p.fono',{color:'#037C8C',fontSize:'18px'}); 

	Cufon.replace('p.email',{color:'#000',fontSize:'18px'});

	Cufon.replace('p.tituloRedesSociales',{color:'#7BB41F',fontSize:'14px'});

/*	Cufon.replace('a.linksMenu', {

		fontSize:'18px'

	});	*/

});



$(document).ready(function(){

    $("#m5").addClass("activamenu");

}); 



</script>
<title>IMPACTO PROMOCIONAL SAC | CONTÁCTENOS | articulos publicitarios, merchandising para empresas,  productos publicitarios peru| venta articulos, publicidad para empresas, impresion tazas, impresion articulos publicitarios, llaveros publicitarios peru, articulos de publicidad peru, empresa de publicidad lima, tazas publicitarias peru, thermos publicitarios, soluciones publicitarios peru, pines publicitarios peru, agencia de publicidad, estampados publicitarios, impresiones publicitarias, serigrafia publicitarias, serigrafia empresa lima peru, serigrafia y bordados publicidad, merchandising lima peru, articulos de publicidad, gorros publicitarios, polos publicitarios peru</title>
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
    <div id="contactenos">
      <h1>contáctenos</h1>
      <div id="contenido_mapa_contactenos">
        <iframe width="980" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps/ms?msa=0&amp;msid=214422861061814697121.0004e452f4a2d9d2b4cb1&amp;hl=en&amp;ie=UTF8&amp;t=m&amp;ll=-12.114796,-77.016671&amp;spn=0.008392,0.021007&amp;z=16&amp;output=embed"></iframe>
        <br />
      </div>
      <!-- contenido_contactenos -->
      
      <div id="contenido_contactenos">
		<?php
        	echo $row_contactenos['descripcion']; 
		?>
        <div id="formulario_contactenos_der">
          <div id="content_form_contactenos">
            <h2>Formulario de contáctenos</h2>
            <!--<form name="formulario" id="formulario_contactenos" method="post">
              <label class="form_lab">
              <p>Nombres:</p>
              </label>
              <input type="text" maxlength="30" size="20" id="nombres" class="validate[required] borde_texto" name="nombres">
              <br>
              <label class="form_lab">
              <p>E-mail:</p>
              </label>
              <input type="text" id="email" class="validate[required,custom[email] borde_texto" size="20" maxlength="30" name="email">
              <br>
              <label class="form_lab">
              <p>Teléfono:</p>
              </label>
              <input type="text" maxlength="30" size="20" id="telefono" class="validate[required,custom[number],minSize[6]] borde_texto" name="telefono">
              <br>
              <label class="form_lab">
              <p>Dirección:</p>
              </label>
              <input type="text" maxlength="30" size="20" id="direccion" class="validate[required] borde_texto" name="direccion">
              <div id="texto_mensaje">
                <label class="form_lab">
                <p>Mensaje:</p>
                </label>
                <textarea id="mensaje" class="validate[required] borde" name="mensaje"></textarea>
                <br>
              </div>
              <label id="estado"></label>
              <div class="botones_contactenos">
                <input type="submit" value="Enviar" id="boton_contactenos" name="enviar">
                <br>
              </div>
            </form>-->
            
            
          <?php

	include("form.php");

?>
            
            
          </div>
          <!-- content_form --> 
          
        </div>
        <!-- contactenos_der --> 
        
      </div>
      <!-- contenido_contactenos --> 
      
    </div>
    <!-- contactenos --> 
    
  </div>
  <!-- contenido_cuerpo --> 
  
</div>
<!-- cuerpo -->

<?php

	include("includes/footer.php");

	

?>
</body>
</html>