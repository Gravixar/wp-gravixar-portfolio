<?php

// Load Front end CSS and JS
function gravixar_portfolio_scripts() {
	// Bootstrap 
	wp_enqueue_style( 'gravixarbootstrap', plugin_dir_url(dirname(__FILE__)) . 'bootstrap/css/bootstrap.min.css');
	// Featherlight
        wp_enqueue_style( 'gravixarflcss', plugin_dir_url(dirname(__FILE__)) . 'css/featherlight.min.css');
        wp_enqueue_style( 'gravixarflgallerycss', plugin_dir_url(dirname(__FILE__)) . 'css/featherlight.gallery.min.css');
        wp_enqueue_script( 'gravixarfljs', plugin_dir_url(dirname(__FILE__)) . 'js/featherlight.min.js','','',true);
        wp_enqueue_script( 'gravixarflgalleryjs', plugin_dir_url(dirname(__FILE__)) . 'js/featherlight.gallery.min.js','','',true);
	// Main CSS
        wp_enqueue_style( 'gravixarportfolio', plugin_dir_url(dirname(__FILE__)) . 'css/gravixar_portfolio.css');
}
add_action( 'wp_enqueue_scripts', 'gravixar_portfolio_scripts', 12,1 );

// Register admin scripts for custom fields
function gravixar_portfolio_load_wp_admin_style() {
        wp_enqueue_media();
	wp_enqueue_script('jquery-ui-datepicker');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
        // admin always last
        wp_enqueue_style( 'gravixar_portfolio_admin_css', plugin_dir_url(dirname(__FILE__)) . 'css/gravixar_portfolio_admin.css' );
        wp_enqueue_script( 'gravixar_portfolio_admin_script', plugin_dir_url(dirname(__FILE__)) . 'js/gravixar_portfolio_admin.js' );
}
add_action( 'admin_enqueue_scripts', 'gravixar_portfolio_load_wp_admin_style' );
