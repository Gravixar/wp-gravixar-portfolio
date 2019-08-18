<?php
/**
 * Plugin Name: Gravixar Portfolio
 * Plugin URI: https://github.com/stardothosting/gravixar-portfolio
 * Description: This is a Wordpress plugin that allows you to easily manage and
 * showcase a grid of your portfolio items. If an item has a "Writeup" or
 * additional information, then clicking the image will go to the single
 * portfolio item page. If not, then it will expand to a larger image. Version:
 * 1.11 Author: Gravixar Web Author URI: https://www.gravixarthemes.com
 * License: GPLv3
 */

require_once( plugin_dir_path( __FILE__ ) . 'components/enqueuing.php' );
require_once( plugin_dir_path( __FILE__ ) . 'components/custompost.php' );
require_once( plugin_dir_path( __FILE__ ) . 'components/metabox.php' );

// Get image ID from URL
function gravixar_portfolio_get_image_id( $image_url ) {
	global $wpdb;
	$attachment = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ) );
	if ( sizeof( $attachment ) > 0 ) {
		return $attachment[0];
	}

	return - 1;
}

// Short-code for multiple portfolio system
function gravixar_portfolio_shortcode( $atts ) {
	extract( shortcode_atts( [
		'numposts'  => '-1',
		'numperrow' => '6',
	], $atts ) );

	$args = [
		'numberposts'    => - 1,
		'posts_per_page' => - 1,
		'post_type'      => 'gravixar_portfolio',
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
	];

	// check if number per row is divisible by 12.
	if ( $numperrow % 12 != 0 ) {
		$numperrow = 12 / $numperrow;
	} else {
		$numperrow = 6;
	}


	global $post;
	$out   = '';
	$posts = new WP_Query( $args );
	if ( $posts->have_posts() ) {
		$out .= '<div id="gravixar-peffect" class="gravixar-portfolio-container effects clearfix row" >';
		while ( $posts->have_posts() ) {
			$posts->the_post();
			// get event image
			$work_image_url = esc_url( get_post_meta( get_the_ID(), 'gravixar_portfolio_image', true ) );
			$work_image     = wp_get_attachment_image_src( gravixar_portfolio_get_image_id( $work_image_url ), 'large' );

			$work_image_display = null;
			// get link to work page
			$work_link = get_post_permalink( $posts->ID );
			// get gallery ids
			$work_gallery = explode( ',', get_post_meta( get_the_ID(), 'gravixar_portfolio_image', true ) );

			if ( ! empty( $work_image ) ) {
				$work_image_display = '<div class="gravixar-portfolio-image-cropped" style="background-image: url(\'' . $work_image[0] . '\');"><div class="gravixar-portfolio-image-layer"><h2>' . get_the_title() . '</h2></div></div>';
			}
			// get project name
			$out .= '<div class="col-lg-' . $numperrow . ' col-md-' . $numperrow . ' col-xs-12 gravixar-portfolio-thumb" id="gravixar-portfolio-' . get_the_ID() . '">
			' . $work_image_display . '
			<div class="gravixar-portfolio-overlay">
			<a href="' . $work_link . '" class="gravixar-portfolio-expand">+</a>
			</div>
			</div>
			<script>
				jQuery("#gravixar-portfolio-' . get_the_ID() . '").click(function() {
				window.location = jQuery(this).find("a").attr("href");
				return false;
				});
			</script>
			';
		}
	} else {
		return;
	}
	$out .= '</div></div>';
	wp_reset_query();

	return html_entity_decode( $out );
}

add_shortcode( 'gravixar_portfolio', 'gravixar_portfolio_shortcode' );
