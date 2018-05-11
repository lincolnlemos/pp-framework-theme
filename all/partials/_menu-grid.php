<div class="row">

	<div class="col-sm-3">
		<a id="logotipo" class="logotipo logotipo-cabecalho" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php echo get_field('logotipo', 'options'); ?>" class="img-fluid"/>
		</a>
	</div>

	<div class="col-sm-9">							
		<?php _partial('menu-nav') ?>						
	</div>					

</div>