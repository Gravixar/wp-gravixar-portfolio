<?php

// Assign template to custom post type
add_filter( 'single_template', 'gravixar_portfolio_custom_post_type_template' );
function gravixar_portfolio_custom_post_type_template($single_template) {
     global $post;
     if ($post->post_type == 'gravixar_portfolio' ) {
	if ( !file_exists(get_template_directory() . '/single-portfolio.php') ) {
		$single_template = plugin_dir_path(dirname(__FILE__)) . 'template/single-portfolio.php';
	} else {
		$single_template = get_template_directory() . '/single-portfolio.php';
	}
     }
     return $single_template;
     wp_reset_postdata();
}

// Register post type
add_action( 'init', 'gravixar_portfolio_register_cpt' );

function gravixar_portfolio_register_cpt() {

        $labels = array(
                'name' => __( 'Gravixar Portfolios', 'gravixar_portfolio' ),
                'singular_name' => __( 'Gravixar Portfolio', 'gravixar_portfolio' ),
                'add_new' => __( 'Add New', 'gravixar_portfolio' ),
                'add_new_item' => __( 'Add New Gravixar Portfolio', 'gravixar_portfolio' ),
                'edit_item' => __( 'Edit Gravixar Portfolio', 'gravixar_portfolio' ),
                'new_item' => __( 'New Gravixar Portfolio', 'gravixar_portfolio' ),
                'view_item' => __( 'View Gravixar Portfolio', 'gravixar_portfolio' ),
                'search_items' => __( 'Search Gravixar Portfolios', 'gravixar_portfolio' ),
                'not_found' => __( 'No gravixar portfolios found', 'gravixar_portfolio' ),
                'not_found_in_trash' => __( 'No gravixar portfolios found in Trash', 'gravixar_portfolio' ),
                'parent_item_colon' => __( 'Parent Gravixar Portfolio:', 'gravixar_portfolio' ),
                'menu_name' => __( 'Gravixar Portfolios', 'gravixar_portfolio' ),
        );

        $args = array(
                'labels' => $labels,
                'hierarchical' => false,
                'description' => 'Gravixar full width portfolio grid',
                'supports' => array( 'editor', 'title' ),
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 5,
                'menu_icon' => 'dashicons-grid-view',
                'show_in_nav_menus' => false,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'has_archive' => false,
                'query_var' => true,
                'can_export' => true,
		'rewrite' => array(
			'slug' => 'portfolio',
			'with_front' => true,
			'feeds' => true,
			'pages' => true
		),
                'capability_type' => 'post'
        );

register_post_type( 'gravixar_portfolio', $args );
}
