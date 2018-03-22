<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link href="<?php echo get_template_directory_uri()	?>/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php
			if ( is_singular() && get_option( 'thread_comments' ) )
				wp_enqueue_script( 'comment-reply' );
			wp_head();
		?>

		<script> 
			// Browser update
			var $buoop = {notify:{e:-2,f:-3,o:-3,s:-2,c:-4},insecure:true,unsupported:true,api:5}; 
			function $buo_f(){ 
			 var e = document.createElement("script"); 
			 e.src = "//browser-update.org/update.min.js"; 
			 document.body.appendChild(e);
			};
			try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
			catch(e){window.attachEvent("onload", $buo_f)}
		</script>
		
	</head>

	<body <?php body_class(); ?>>

		<header id="header">			
			<div class="container">
				<?php get_partial('_menu-nav'); ?>					
			</div>
		</header>



