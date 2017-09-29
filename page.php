<?php get_header(); ?>
	<main id="main-content" class="main" role="main">
		<div class="container">
			<?php 
				echo get_partial('_header-search');
				echo get_partial('_header-archive');
				if (have_posts()): while (have_posts()) : the_post();
					get_partial('_loop-page');
				endwhile; 
					if (function_exists('wp_pagenavi')) { 
						echo '<div class="clearfix"></div>';
						wp_pagenavi();
					};				
				endif; 
				wp_reset_query(); 
			?>
		</div>
	</main>
<?php get_footer(); ?>