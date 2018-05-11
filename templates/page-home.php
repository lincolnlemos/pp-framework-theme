<?php
/**
 * Template Name: Home
 */

get_header(); 
?>
	<?php get_template_part('partials/_slideshow'); ?>
	
	<main id="content" class="container" role="main">
		<section class="row">
			<div class="col-sm-12">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<article <?php post_class(); ?> >
						<header>
							<h1 class="page-title"><?php the_title(); ?></h1>
						</header>
						
						<section>
							<?php the_content(); ?>
						</section>
						
						<footer>
							<?php _loop('_comments-disqus'); ?>
						</footer>

					</article>
				<?php endwhile; // end of the loop. ?>
			</div>
		</section> <!-- row -->
	</main> <!-- #content -->
<?php get_footer(); ?>
