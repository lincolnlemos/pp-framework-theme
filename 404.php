<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>

	<main id="content" class="container" role="main">
		<section class="row">
			<div class="col-sm-8">
				<article <?php post_class(); ?> >
					<h1><?php _e( 'Ops.', 'twentyten' ); ?></h1>
					<p><?php _e( 'Acho que você se perdeu, digite abaixo o que procura ou volte para a página inicial.', 'twentyten' ); ?></p>
					<?php get_search_form(); ?>

					<script type="text/javascript">
						// focus on search field after it has loaded
						document.getElementById('s') && document.getElementById('s').focus();
					</script>

				</article>
			</div>

			<?php get_sidebar(); ?>
			
		</section> <!-- row -->
	</main> <!-- #content -->
<?php get_footer(); ?>