<div id="banner">
    <div class="box_skitter box_skitter_small">
        <?php
        	while($row_banner_small = fetch_array($rpta_banner_small))
			{
		?>
            <li><a href="#cube"><img src="images/slider-2/<?php echo $row_banner_small['imagen_banner_small']; ?>" class="cube" /></a><div class="label_text"><p>cube</p></div></li>
		<?php
			}
		?>
    </div>
    <div class="sombra"></div>
</div><!-- banner -->