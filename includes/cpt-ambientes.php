<?php

/* CPT Ambientes */
/* ----------------------------------------- */
    add_action( 'init', 'register_cpt_ambiente' );

    function register_cpt_ambiente() {

        $labels = array( 
            'name' => _x( 'Ambientes', 'ambiente' ),
            'singular_name' => _x( 'Ambiente', 'ambiente' ),
            'add_new' => _x( 'Adicionar Novo', 'ambiente' ),
            'add_new_item' => _x( 'Adicionar Novo Ambiente', 'ambiente' ),
            'edit_item' => _x( 'Editar Ambiente', 'ambiente' ),
            'new_item' => _x( 'Novo Ambiente', 'ambiente' ),
            'view_item' => _x( 'Visualizar Ambiente', 'ambiente' ),
            'search_items' => _x( 'Pesquisar Ambientes', 'ambiente' ),
            'not_found' => _x( 'Nenhum ambiente encontrado', 'ambiente' ),
            'not_found_in_trash' => _x( 'Nenhum ambiente encontrado na lixeira', 'ambiente' ),
            'parent_item_colon' => _x( 'Parent Ambiente:', 'ambiente' ),
            'menu_name' => _x( 'Ambientes', 'ambiente' ),
        );

        $args = array( 
            'labels' => $labels,
            'hierarchical' => false,
            
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array( 'tipos_de_ambiente' ),
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            
            'show_in_nav_menus' => false,
            'publicly_queryable' => true,
            'exclude_from_search' => false,
            'has_archive' => true,
            'query_var' => true,
            'can_export' => true,
            'rewrite' => true,
            'capability_type' => 'post'
        );

        register_post_type( 'ambiente', $args );
    }
/* ----------------------------------------- CPT Ambientes */        