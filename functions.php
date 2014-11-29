<?php

/**
 * Include the parent theme CSS
 */
function get_parent_theme_css() {
	wp_enqueue_style( 'make-theme', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'get_parent_theme_css' );

/**
 * Add Page Attributes to Restaurant Items
 * The Page Attributes module allows you to set page parents and templates, and to change the order of your pages.
 * http://en.support.wordpress.com/pages/page-attributes/
 */
function restaurant_item_hierarchical( $post_type, $args ) {
	// Make sure we're only editing the post type we want
	if ( 'restaurant_item' != $post_type ) {
		return;
	}

	// Set menu icon
	$args->hierarchical = true;

	// Modify post type object
	$wp_post_types[$post_type] = $args;
}
add_action( 'registered_post_type', 'restaurant_item_hierarchical', 10, 2 );

/**
 * Add Page Attributes to Restaurant Items
 * The Page Attributes module allows you to set page parents and templates, and to change the order of your pages.
 * http://en.support.wordpress.com/pages/page-attributes/
 */
function restaurant_page_attributes() {
	add_post_type_support( 'restaurant_item', 'page-attributes' );
}
add_action( 'init', 'restaurant_page_attributes' );

/**
 * Set default order to be by menu_order, ascending
 */
function t1k_order_main_menu( $query ) {

	// check to see if we're editing the main query on the page.
	if ( $query->is_main_query() ) {

		// Check to make sure I'm on the proper archive page AND I'm not in the admin area
		if ( ( $query->is_post_type_archive( 'restaurant_item' ) || $query->is_tax( 'restaurant_tag' ) ) && ! is_admin() ) {

			// now I want to order by the menu_order field, ascending
			$query->set( 'orderby', 'menu_order' );
			$query->set( 'order', 'ASC' );

		}
	}
	return $query;

}
// now I apply my function to pre_get_posts and Bob's your uncle
add_filter( 'pre_get_posts', 't1k_order_main_menu' );
