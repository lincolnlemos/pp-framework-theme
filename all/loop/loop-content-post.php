<article <?php post_class('box-post'); ?>>
	<?php if (has_post_thumbnail() && !is_single()): ?>
		<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="thumb" <?php echo thumbnail_bg() ?>> </a>
	<?php endif; ?>
	<div class="content <?php if (!has_post_thumbnail()) { echo 'large'; } ?>">
		<div class="box-align">
			<ul class="infos">
				<li><time><?php the_date(); ?></time></li>
				<li>
					<span class="category">
						<?php the_category(', '); ?>
					</span>
				</li>
			</ul>
			<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>">
				<h2><?php the_title(); ?></h2>
			</a>			
			<?php if (!is_single()): ?>
				<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>" class="hidden-sm hidden-xs p1">
					<?php echo get_the_excerpt(); ?>
					<br><br>
				</a>
				<a href="<?php the_permalink(); ?>" title="Saiba mais sobre: <?php the_title(); ?>" class="hidden-xs btn-icon"> <span><i class="icon-seta-dupla-white"></i></span> continue lendo </a>
			<?php endif ?>			
		</div>
	</div>
</article>