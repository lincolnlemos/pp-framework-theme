<?php

// ADMIN MENU
// YOAST
// DASHBOARD
// WP-LOGIN

/* ADMIN MENU */
/* ----------------------------------------- */
  // Change menu with fontawesome icons  
  // add_action('admin_head', 'fontawesome_icon_dashboard');

  function fontawesome_icon_dashboard() {
     echo "<style type='text/css' media='screen'>
        #adminmenu #menu-posts-produto div.wp-menu-image:before { font-family:'FontAwesome' !important; content:'\\f0a4'; }  
     </style>";
  }
/* ----------------------------------------- ADMIN MENU */    


/* YOAST */
/* ----------------------------------------- */
  // Filter Yoast Meta Priority
  add_filter( 'wpseo_metabox_prio', function() { return 'low';});
/* ----------------------------------------- YOAST */    


/* DASHBOARD */
/* ----------------------------------------- */
  // Remove default dashboard widgets
  add_action('admin_menu', 'disable_default_dashboard_widgets');


  function disable_default_dashboard_widgets() {
    remove_meta_box('dashboard_browser_nag', 'dashboard', 'core');
    remove_meta_box('dashboard_right_now', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
    remove_meta_box('dashboard_plugins', 'dashboard', 'core');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
    remove_meta_box('dashboard_primary', 'dashboard', 'core');
    remove_meta_box('dashboard_secondary', 'dashboard', 'core');
    remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
  }

/* ----------------------------------------- DASHBOARD */    
  

/* WP-LOGIN */
/* ----------------------------------------- */
  // Call wp-login Styles
  add_action( 'login_head', 'wpmidia_custom_login' );
  
  // Change URL logotype
  add_filter('login_headerurl', 'wpmidia_custom_wp_login_url');

  // Change title logotype
  add_filter('login_headertitle', 'wpmidia_custom_wp_login_title');

  function wpmidia_custom_login() {
      echo '<link media="all" type="text/css" href="'.get_template_directory_uri().'/assets/css/login-style.css" rel="stylesheet">';

      $logotipoID = get_post_meta(get_option( 'page_on_front' ), 'logotipo', 1);
      if ($logotipoID) {
      ?>
        <style type="text/css" media="screen">
          body.login h1 a {
            background-image: url(<?php echo wp_get_attachment_url($logotipoID); ?>);
            background-size: contain;
            background-position: center center;
          }
        </style>   
      <?php      
      }    
  }

  function wpmidia_custom_wp_login_url() {
    return home_url();
  }

  function wpmidia_custom_wp_login_title() {
    return get_option('blogname');
  }
/* ----------------------------------------- WP-LOGIN */    



/* Adiciona o ID do usuário no body-class */
/* ----------------------------------------- */
function id_usuario_body_class( $classes ) {
  global $current_user;
    $classes .= ' user-' . $current_user->ID;
  return trim( $classes );
}
add_filter( 'admin_body_class', 'id_usuario_body_class' );




