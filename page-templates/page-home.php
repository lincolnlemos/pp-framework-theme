<?php
/**
 * Template Name: Home
 *
 * A custom page template homepage.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.1
 */

get_header(); ?>
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
							<?php get_block('comments-disqus'); ?>
						</footer>

					</article>
				<?php endwhile; // end of the loop. ?>
			</div>
		</section> <!-- row -->
	</main> <!-- #content -->
<?php get_footer(); ?>
