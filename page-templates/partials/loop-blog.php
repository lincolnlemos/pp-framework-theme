<?php 
	echo get_partial('_header-search');
	echo get_partial('_header-archive');

	if (have_posts()): 

		while (have_posts()) : the_post();
		get_block('loop-content-post');

		endwhile; 
		if (function_exists('wp_pagenavi')) { wp_pagenavi(); };
	endif; 
	wp_reset_query(); 
?>