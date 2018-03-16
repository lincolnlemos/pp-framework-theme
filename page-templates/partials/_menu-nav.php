<?php   
  $mobileLogo = get_field('mobile_logotipo', 'options');
  $logotipo = get_field('logotipo', 'options');
?>
  <div class="row">
    <nav id="navmenu" class="navbar navbar-expand-lg navbar-light animation-close-toggle w-100">
      <a class="navbar-brand" href="<?php echo get_home_url(); ?>"> 
        
        <?php         
          // Se estiver cadastrado o logotipo, exibe o mesmo. 
          // Caso contrário exibe o nome do site
          $headerName = $logotipo ? 
            '<img src="'. $logotipo .'" class="d-none d-md-inline-block img-fluid" alt="Logotipo '.get_bloginfo().'"/>' :
            get_bloginfo( 'name' );
          echo $headerName;

          // Se existir logo para mobile, exibe-o
          echo ($mobileLogo ? '<img src="'. $mobileLogo .'" height="30" class="d-inline-block img-fluid d-md-none align-top" alt="Logotipo '.get_bloginfo().'">' : '');

        ?>
        
      </a>
      
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span></span><span></span><span></span>
      </button>

        <?php 
          wp_nav_menu( array(         
            'theme_location'    => 'global',
            'depth'             => 3,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse',
            'container_id'      => 'navbarNav',
            'menu_class'        => 'navbar-nav ml-auto', // A classe mr-auto alinha o menu a direita
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker()
          )); 
        ?>          
    </nav><!-- /.navbar-collapse -->    
  </div>