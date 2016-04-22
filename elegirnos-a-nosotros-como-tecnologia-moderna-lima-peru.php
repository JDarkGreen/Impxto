<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/estilos.css"/>
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/examples.css" />
<!-- -->
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
<!-- script jquery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<!-- jquery carousel -->
<script type="text/javascript" src="js/home.js"></script>
<script type="text/javascript" src="js/jquery.carouFredSel-6.0.5-packed.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript"> 

function mainmenu()
{
	$(" #nav ul ").css({display: "none"});
	$(" #nav li").hover(function(){
		$(this).find('ul:first:hidden').css({visibility: "visible",display: "none"}).slideDown(400);
		},function(){
			$(this).find('ul:first').slideUp(400);
		});
}

$(document).ready(function(){
	mainmenu();
});

</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#m3").addClass("select");
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#pe1").addClass("activesubmenu");
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#pes1").addClass("activaproducto");
});
</script>
<script type="text/javascript">
$(document).ready(function() {

//When mouse rolls over
  $('#lista_elegirnos a').hover(function() {
    $(this).animate( {marginLeft: "14px"}, {queue: false, duration: 'fast'} );

  }, function() {
    $(this).animate( {marginLeft: "8px"}, {queue: false, duration: 'fast'} );  

    });

  }); // end of document ready
</script>
<title>Continental company</title>
</head>

<body>
<?php
	include("includes/header.html");
?>
<div id="cuerpo-fondo">
  <div id="cuerpo_porque_elegirnos" class="limpiar">
    
    <div id="titulo_productos">
    	<h1>PORQUE ELEGIRNOS</h1>
    </div>
    
    <div id="contenido_porque_elegirnos" class="limpiar">
    
        <div id="columna_prod_izq">
        	
			<?php
            	include("includes/menu-porque-elegirnos.html");
			?>
        
        </div><!-- columna_prod_izq -->
        
        <div id="columna_prod_der">
            <h2>TECNOLOGIA MODERNA</h2>
            <div style="float:left; height:auto; width:668px;">
       	    	<img src="images/tecnologia-moderna-para-asfaltos-lima-peru.jpg" alt="elegirnos como tecnologia moderna en asfalto lima peru" /> 
            </div>
            <div id="contenido_col_der_elegirnos">
                <p>Nuestro compromiso  es  contribuir  al  progreso  de  nuestro  país;  El  mismo  que  por presentar diversas regiones naturales (costa, sierra y selva) con variados climas, nos ha permitido determinar el uso específico de los diversos grados de asfaltos de acuerdo  a las condiciones climatológicas de cada región.</p>
                <p>Tenemos la misión de producir e introducir al mercado  líneas  de  productos  asfalticos para impermeabilización, ofreciendo así al mercado nacional productos  y  servicios  de calidad y nuevos desarrollos adaptables a las necesidades de nuestros clientes.</p>
                
            </div><!-- contenido_col_der_elegirnos -->

      </div><!-- columna_prod_der -->
       
        
     </div><!-- contenido_cuerpo_productos -->
    
  </div>
  
</div>
<div id="footer-fondo">
  <div id="footer">
    <?php include("includes/footer.html"); ?>
  </div>
</div>
<script type="text/javascript">

$("#a").addClass("select");

</script>
</body>
</html>
