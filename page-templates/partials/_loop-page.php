<article <?php post_class(); ?> >
	<header>
		<h1 class="page-title"><?php the_title(); ?></h1>
	</header>
	
	<div class="conteudo">
		<?php the_content(); ?>
	</div>
	
	<footer>
		<?php get_block('_comments-disqus'); ?>
	</footer>

</article>