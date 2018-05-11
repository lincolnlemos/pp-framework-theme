<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">		
		<?php wp_head(); ?>

		<script> 
			// Browser update
			var $buoop = {vs:{i:10,f:-4,o:-4,s:8,c:-4},unsecure:true,api:4}; 
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
				<?php _partial('_menu-nav'); ?>					
			</div>
		</header>



