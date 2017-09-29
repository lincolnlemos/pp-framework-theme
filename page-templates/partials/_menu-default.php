	<nav id="navmenu" class="navbar navbar-default" role="navigation">
	  <div class="navbar-header">
	    <a class="navbar-brand visible-xs" href="#">Menu</a>
      <button type="button" class="navbar-toggle offcanvas-toggle pull-right" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas" style="float:left;">
        <span class="sr-only">Toggle navegação</span>
        <span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </span>
      </button>
	  </div>
  	<?php 
  		wp_nav_menu( array( 
    		'menu'              => 'principal',
        'theme_location'    => 'global',
        'depth'             => 2,
        'container'         => 'div',
        'container_class'   => 'navbar-offcanvas navbar-offcanvas-touch',
        'container_id'  	  => 'js-bootstrap-offcanvas',
        'menu_class'        => 'nav navbar-nav',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new wp_bootstrap_navwalker()
  		)); 
  	?>    
	</nav><!-- /.navbar-collapse -->		