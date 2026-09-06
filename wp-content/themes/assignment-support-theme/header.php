<?php
/**
 * Site header.
 *
 * @package Assignment_Support
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'assignment-support' ); ?></a>
<div class="announcement-bar" role="status">
	<div class="container"><?php esc_html_e( 'Academic support focused on learning and integrity.', 'assignment-support' ); ?></div>
</div>
<header class="site-header" id="masthead">
	<div class="container header-inner">
		<div class="site-branding">
			<?php echo wp_kses_post( assignment_support_site_logo_markup() ); ?>
		</div>
		<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-menu">
			<span class="screen-reader-text"><?php esc_html_e( 'Toggle navigation', 'assignment-support' ); ?></span>
			<span aria-hidden="true">☰</span>
		</button>
		<nav class="primary-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'assignment-support' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
		<a class="button header-cta" href="<?php echo esc_url( home_url( '/#enquiry' ) ); ?>"><?php esc_html_e( 'Get a Free Support Plan', 'assignment-support' ); ?></a>
	</div>
</header>
