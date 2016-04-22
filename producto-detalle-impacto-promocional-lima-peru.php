<?php

	include("includes/conexion.php");
	include("includes/funciones.php");

	// definimos la variable conexion.	
	$cn = Conexion();
	
	// almacenar los banners.
	$rpta_banner = Banners();
	
	// mostrar el detalle del producto.
	$rpta_producto = DetalleProducto($_GET['idproducto']);
	$row_producto  = fetch_array($rpta_producto);

	// muestro la funcion Categorias();
	$rpta_categorias = Categorias();

	//  muestro el titulo de la subcategoria del producto.
	$rpta_titcat   = tituloCat($_GET['idcategoria']);
	$row_titcat	   = fetch_array($rpta_titcat);
	$tit_categoria = ($_GET['idcategoria']=='')?'PORTADA':$row_titcat['categoria'];
	
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
<link rel="stylesheet" type="text/css" href="css/paginacion.css" />
<link rel="stylesheet" type="text/css" href="css/validador.css" />
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
			preview: true
		});
	});
</script>
<!-- jquery validation engine -->
<script type="text/javascript" src="js/jquery.validationEngine.js"></script>
<script type="text/javascript" src="js/jquery.validationEngine-es.js"></script>
<script type="text/javascript" src="js/validar_pedido.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {

//When mouse rolls over
  jQuery('#categorias li a').hover(function() {
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
/*	Cufon.replace('a.linksMenu', {
		fontSize:'18px'
	});*/	
});

jQuery(document).ready(function($){
    jQuery("#m1").addClass("activamenu");
}); 

</script>
<title>Documento sin título</title>
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
                
                <div id="video"> 
                    <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FIMPACTOPROMOCIONAL&amp;width=260&amp;height=590&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=true&amp;show_border=true&amp;appId=1444584859098602" scrolling="no" frameborder="0" style="background:#FFF; border:none; overflow:hidden; width:260px; height:590px;" allowTransparency="true"></iframe>
                </div>        
                
                <div id="portada_video"> 
                    <iframe width="255" height="169" src="//www.youtube.com/embed/<?php echo $row_produccion['video_produccion']; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
            
            </div><!-- columna_izq -->
            
            <div id="columna_der">
                <h1><?php echo strtoupper($tit_categoria); ?></h1>
                
              <div id="detalle_producto">
                	
                <div id="imagen_producto">
               	  <img src="images/productos/detalle/<?php echo $row_producto['imagen_prod_detalle']; ?>" />
                </div><!-- imagen_producto -->
                    
                <div id="descripcion">
                    	<p class="titulo_producto"><?php echo $row_producto['nombre_producto']; ?></p>
                        <p class="codigo">Cod: <span><?php echo $row_producto['codigo_producto']; ?></span></p>
                        <?php
                        	echo $row_producto['descripcion'];
						?>
                    </div><!-- descripcion -->
                    
                    <div id="boton_cotizar">
                    	<a href="index.php?idproducto=<?php echo $row_producto['idproducto']; ?>&idcategoria=<?php echo $row_producto['idcategoria']; ?>"><img src="images/boton_regresar.png" width="85" height="25" /></a>
                  </div>
                
              </div><!-- descripcion -->
              
              <div id="formulario_cotizar">
				<h2>cotizar</h2>
                
                <div id="content_form_pedido">
                
                  <form name="formulario_pedidos" id="formulario_pedidos" method="post" action="">
                     <input type="hidden" name="producto" id="producto" value="<?php echo $row_producto['idproducto']; ?>" />
					 <div style="float:left; height:auto; padding-left: 12px;">
                         <label class="form_lab">
                          <p>Razón social:</p>
                         </label>
                         <input type="text" maxlength="30" size="20" id="razon_social" class="validate[required] borde_texto" name="razon_social">
                         <br>
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
                         <p>Telf.:</p>
                         </label>
                         <input type="text" maxlength="30" size="20" id="telefono" class="validate[required,custom[number],minSize[6]] borde_texto" name="telefono">
                         <br>
                         <label class="form_lab">
                         <p>Dirección:</p>
                         </label>                     
                         <input type="text" maxlength="30" size="20" id="direccion" class="validate[required] borde_texto" name="direccion"> 
                         <br>                     
                     </div>
                     <div style="float:right; height:auto; padding-left: 13px; width:266px;">
                         <label class="form_lab_derecha">
                         <p style="text-align:left; padding:0;">Cantidad:</p>
                         </label>
                         <input type="text" maxlength="30" size="20" id="cantidad" class="validate[required,custom[number]] borde_cantidad" name="cantidad">                                                         
                         <div id="texto_mensaje">
                            <label class="form_lab_derecha">
                            <p style="text-align:left;">Comentarios:</p>
                            </label>
                            <br />
                            <textarea id="mensaje" class="validate[required] borde" name="mensaje"></textarea>
                            <br>
                         </div>
                         <label id="estado_pedido"></label>
                         <div class="botones_pedido">
                            <input type="submit" value="Enviar" id="boton_pedido" name="enviar">
                            <br>
                         </div>
                     </div>
                  </form>                	
                
                </div><!-- content_form_pedido -->
              
              </div><!-- formulario_cotizar -->
                
            </div><!-- columna_der -->
        
        </div> <!-- bienvenida -->
    
    </div><!-- contenido_cuerpo -->

</div><!-- cuerpo -->

<?php
	include("includes/footer.php");
	
?>

</body>
</html>