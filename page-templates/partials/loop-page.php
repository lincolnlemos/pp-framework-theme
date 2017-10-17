<?php global $post; ?>

<?php while (have_posts()) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header>
			<h1 class="page-title">
				<?php the_title(); ?>
			</h1>
		</header>
		
		<div class="conteudo">
			<?php
				// Se não exister conteúdo, exibe as páginas filhas
				if (!$post->post_content) { echo do_shortcode('[paginas-filhas]'); }				
				the_content(); 
			?>
		</div>
		
		<footer>
			<?php get_block('_comments-disqus'); ?>
		</footer>

	</article>
<?php endwhile; ?>