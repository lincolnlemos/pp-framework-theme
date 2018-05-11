<?php 
/**
 * Template Name: Página c/ Sidebar
*/
get_header();

	echo get_template_part('partials/_main-start');
		get_loop('index');
	echo get_template_part('partials/_main-end');
	
get_footer();
?>