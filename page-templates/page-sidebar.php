<?php 
/**
 * Template Name: Página c/ Sidebar
 * 
*/
get_header(); ?>

	<main id="main-content" class="main" role="main">		
		<div class="container">
			
			<div id="sidebar" class="sidebar">
	        <div class="sidebar__inner">
	            <?php 
	            	if ( is_active_sidebar( 'sidebar-principal' ) ) :

	            		echo '<aside id="sidebar"';
	            			dynamic_sidebar( 'sidebar-principal' );
	            		echo '</aside><!-- #sidebar -->';

	            	endif;
	            ?>
	        </div>
	    </div>
	    
	    <div id="content" class="content">
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
		</div>
	</main>
<?php get_footer(); ?>
