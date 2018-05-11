<?php 
	get_header();

		echo get_template_part('partials/_main-start');
			_loop('index');
		echo get_template_part('partials/_main-end');
		
	get_footer();
?>