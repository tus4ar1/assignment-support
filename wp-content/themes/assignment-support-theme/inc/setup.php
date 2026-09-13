<?php
/**
 * Theme setup and registrations.
 *
 * @package Assignment_Support
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Configure theme defaults and WordPress features.
 */
function assignment_support_setup() {
	load_theme_textdomain( 'assignment-support', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array( 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );

	register_nav_menus(
		array(
			'primary' => __( 'Primary navigation', 'assignment-support' ),
			'footer'  => __( 'Footer navigation', 'assignment-support' ),
		)
	);
}
add_action( 'after_setup_theme', 'assignment_support_setup' );

/** Link to the Posts page configured under Settings > Reading. */
function assignment_support_blog_url() {
	$posts_page = (int) get_option( 'page_for_posts' );
	return $posts_page ? get_permalink( $posts_page ) : home_url( '/blog/' );
}

/**
 * Provide a default site name and logo when none is set in WordPress.
 */
function assignment_support_default_site_name( $value ) {
	if ( '' === $value || false === $value ) {
		return 'My best assignment';
	}

	return $value;
}
add_filter( 'pre_option_blogname', 'assignment_support_default_site_name' );
add_filter( 'option_blogname', 'assignment_support_default_site_name' );

/**
 * Return the site logo markup, using the bundled logo as a fallback.
 */
function assignment_support_site_logo_markup() {
	if ( has_custom_logo() ) {
		return get_custom_logo();
	}

	$logo_url = get_template_directory_uri() . '/assets/logo/Contrasting Color Book Logo with Checkmark.png';
	$site_name = esc_attr( get_bloginfo( 'name' ) );
	$home_url = esc_url( home_url( '/' ) );

	return sprintf(
		'<a class="custom-logo-link" href="%1$s" rel="home"><img src="%2$s" alt="%3$s" class="custom-logo" /></a>',
		$home_url,
		esc_url( $logo_url ),
		$site_name
	);
}
