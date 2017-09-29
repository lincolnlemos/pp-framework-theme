<?php 
	/**
	* Registers a new post type
	* @uses $wp_post_types Inserts new post type object into the list
	*
	* @param string  Post type key, must not exceed 20 characters
	* @param array|string  See optional args description above.
	* @return object|WP_Error the registered post type object, or an error object
	*/
	function cpt_servicos() {
	
		$labels = array(
			'name'                => __( 'Serviços', 'angolanos' ),
			'singular_name'       => __( 'Serviço', 'angolanos' ),
			'add_new'             => _x( 'Add New Serviço', 'angolanos', 'angolanos' ),
			'add_new_item'        => __( 'Add New Serviço', 'angolanos' ),
			'edit_item'           => __( 'Edit Serviço', 'angolanos' ),
			'new_item'            => __( 'New Serviço', 'angolanos' ),
			'view_item'           => __( 'View Serviço', 'angolanos' ),
			'search_items'        => __( 'Search Serviços', 'angolanos' ),
			'not_found'           => __( 'No Serviços found', 'angolanos' ),
			'not_found_in_trash'  => __( 'No Serviços found in Trash', 'angolanos' ),
			'parent_item_colon'   => __( 'Parent Serviço:', 'angolanos' ),
			'menu_name'           => __( 'Serviços', 'angolanos' ),
		);
	
		$args = array(
			'labels'                   => $labels,
			'hierarchical'        => false,
			'description'         => 'description',
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => null,
			'menu_icon'           => null,
			'show_in_nav_menus'   => true,
			'publicly_queryable'  => true,
			'exclude_from_search' => false,
			'has_archive'         => true,
			'query_var'           => true,
			'can_export'          => true,
			'rewrite'             => true,
			'capability_type'     => 'post',
			'supports'            => array(
				'title', 'editor', 'thumbnail',
				// 'excerpt','custom-fields', 'trackbacks', 'comments', 'author', 
				// 'revisions', 'page-attributes', 'post-formats'
				)
		);
	
		register_post_type( 'servico', $args );
	}
	
	add_action( 'init', 'cpt_servicos' );
		
?>