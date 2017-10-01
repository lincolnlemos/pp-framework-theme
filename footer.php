	<footer id="footer" role="contentinfo">
		<div class="container">
			<a class="logotipo logotipo-rodape" href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<img src="<?php echo get_field('logotipo_rodape', get_option( 'page_on_front' )); ?>" class="img-responsive"/>
			</a>
			<p> © Copyright <?php echo date('Y') ?> - <?php bloginfo('name'); ?> - Todos direitos reservados</p>
		</div>		
	</footer>

<?php wp_footer(); ?>
</body>
</html>
