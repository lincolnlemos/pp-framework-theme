<?php get_header(); ?>
	<main id="main-content" class="main">
		<div class="container">
			<?php 
				if (is_page()) {
					get_partial('loop-page');
				} elseif (is_single()) {
					get_partial('loop-single');
				} elseif (is_page_template('page-templates/page-sidebar.php')) {					
					get_partial('loop-page-sidebar');					
				} elseif (is_404()) {
					get_partial('loop-404');
				} else {
					get_partial('loop-blog');
				}				
			?>
		</div>
	</main>
<?php get_footer(); ?>
