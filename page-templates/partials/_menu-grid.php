<div class="row">

	<div class="col-sm-3">
		<a id="logotipo" class="logotipo logotipo-cabecalho" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
			<img src="<?php echo get_field('logotipo', get_option( 'page_on_front' )); ?>" class="img-responsive"/>
		</a>
	</div>

	<div class="col-sm-9">							
		<?php get_partial('menu-nav') ?>						
	</div>					

</div>