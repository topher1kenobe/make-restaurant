<?php

function get_parent_theme_css() {
	wp_enqueue_style( 'make-theme', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'get_parent_theme_css' );

add_theme_support( 'restaurant' );

function restaurant_page_attributes() {
	add_post_type_support( 'restaurant_item', 'page-attributes' );
}
add_action( 'init', 'restaurant_page_attributes' );
