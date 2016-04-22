<div id="banner">
    <div class="box_skitter box_skitter_large">
        <ul>
        <?php		
        	while($row_banner = fetch_array($rpta_banner))
			{
		?>
            <li><a href="#cube"><img src="images/slider/<?php echo $row_banner['imagen_banner']; ?>" class="cube" /></a><div class="label_text"><p>cube</p></div></li>
		<?php
			}
		?>
        </ul>
    </div>
    <div class="sombra"></div>
</div><!-- banner -->