<?php 
  $mobileLogo = get_field('mobile_logotipo', get_option( 'page_on_front' ));
?>
  <nav id="navmenu" class="navbar navbar-expand-lg navbar-light animation-close-toggle">
    <a class="navbar-brand" href="<?php echo get_home_url(); ?>">     
      <img src="<?php echo get_field('logotipo', get_option( 'page_on_front' )); ?>" class="img-responsive"/>
      <?php if ($mobileLogo): ?>
         <img src="<?php echo $mobileLogo; ?>" width="30" height="30" class="d-inline-block align-top" alt="">
       <?php endif ?>       
      <?php echo get_bloginfo( 'name' ) ?>
    </a>
    
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span></span><span></span><span></span>
    </button>

      <?php 
        wp_nav_menu( array(         
          'theme_location'    => 'global',
          'depth'             => 2,
          'container'         => 'div',
          'container_class'   => 'collapse navbar-collapse',
          'container_id'      => 'navbarNav',
          'menu_class'        => 'navbar-nav',
          'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
          'walker'            => new WP_Bootstrap_Navwalker()
        )); 
      ?>          
  </nav><!-- /.navbar-collapse -->    