<!-- banner -->
  <?php if( have_rows('slider_principal',get_option( 'page_on_front' )) ): ?>
    <article id="slideshow" role="banner">
      <section class="banner">
        <?php  while ( have_rows('slider_principal',get_option( 'page_on_front' )) ) : the_row();
        
          $image = get_sub_field('imagem_slider');
          $url = $image['url'];
        
          $size = 'slider-destaque';
          $thumb = $image['sizes'][ $size ];
        ?>
          <div>
            <section class="banner-mask">
              <h4><?php the_sub_field('titulo_slider'); ?></h4>
              <p><?php the_sub_field('descricao_slider'); ?></p>
              <a href="<?php the_sub_field('link_slider'); ?>">Leia mais...</a>
            </section>
            
            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" class="img-responsive" />
          </div>
        <?php endwhile; ?>
      </section>
    </article>
  <?php endif; ?>
<!-- banner end -->