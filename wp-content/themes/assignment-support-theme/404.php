<?php
/**
 * Not-found template.
 *
 * @package Assignment_Support
 */

get_header();
?>
<main id="primary" class="site-main content-area">
	<div class="container prose error-404">
		<h1><?php esc_html_e( 'Page not found', 'assignment-support' ); ?></h1>
		<p><?php esc_html_e( 'The page may have moved or the address may be incorrect.', 'assignment-support' ); ?></p>
		<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Return to the homepage', 'assignment-support' ); ?></a>
	</div>
</main>
<?php
get_footer();
