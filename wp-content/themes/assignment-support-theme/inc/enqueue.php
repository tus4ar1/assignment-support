<?php
/**
 * Theme asset loading.
 *
 * @package Assignment_Support
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue public styles and scripts.
 */
function assignment_support_enqueue_assets() {
	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_style( 'assignment-support-style', get_stylesheet_uri(), array(), $version );
	wp_enqueue_style( 'assignment-support-main', get_template_directory_uri() . '/assets/css/main.css', array( 'assignment-support-style' ), $version );
	wp_enqueue_style( 'assignment-support-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array( 'assignment-support-main' ), $version );

	wp_enqueue_script( 'assignment-support-main', get_template_directory_uri() . '/assets/js/main.js', array(), $version, true );
}
add_action( 'wp_enqueue_scripts', 'assignment_support_enqueue_assets' );

