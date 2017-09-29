<?php

/* CPT e Taxnomia padrão para Produtos */
/* ----------------------------------------- */
    add_action( 'init', 'register_cpt_produto' );

    function register_cpt_produto() {

        $labels = array( 
            'name' => _x( 'Produtos', 'produto' ),
            'singular_name' => _x( 'Produto', 'produto' ),
            'add_new' => _x( 'Adicionar Novo', 'produto' ),
            'add_new_item' => _x( 'Adicionar Novo Produto', 'produto' ),
            'edit_item' => _x( 'Editar Produto', 'produto' ),
            'new_item' => _x( 'Novo Produto', 'produto' ),
            'view_item' => _x( 'Visualizar Produto', 'produto' ),
            'search_items' => _x( 'Pesquisar Produtos', 'produto' ),
            'not_found' => _x( 'Nenhum produto encontrado', 'produto' ),
            'not_found_in_trash' => _x( 'Nenhum produto encontrado na lixeira', 'produto' ),
            'parent_item_colon' => _x( 'Parent Produto:', 'produto' ),
            'menu_name' => _x( 'Produtos', 'produto' ),
        );

        $args = array( 
            'labels' => $labels,
            'hierarchical' => false,
            
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'taxonomies' => array( 'category' ),
            
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

        register_post_type( 'produto', $args );
    }

/* ----------------------------------------- CPT para Produtos */        