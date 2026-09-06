<?php
/**
 * Site footer.
 *
 * @package Assignment_Support
 */
?>
<footer class="site-footer" id="colophon">
	<div class="container footer-grid">
		<div>
			<p class="footer-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></p>
			<p><?php esc_html_e( 'Ethical guidance designed to help students understand and improve their own work.', 'assignment-support' ); ?></p>
		</div>
		<nav aria-label="<?php esc_attr_e( 'Footer navigation', 'assignment-support' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'container'      => false,
					'fallback_cb'    => false,
				)
			);
			?>
		</nav>
		<div>
			<p><strong><?php esc_html_e( 'Contact details', 'assignment-support' ); ?></strong></p>
			<p>
				<a href="https://wa.me/917878273480" target="_blank" rel="noreferrer"><?php esc_html_e( 'WhatsApp: +91 78782 73480', 'assignment-support' ); ?></a><br />
				<?php esc_html_e( 'Email: to be added', 'assignment-support' ); ?>
			</p>
		</div>
	</div>
	<div class="container footer-bottom">
		<p>&copy; <?php echo esc_html( wp_date( 'Y' ) ); ?> <?php echo esc_html( get_bloginfo( 'name' ) ); ?>. <?php esc_html_e( 'All rights reserved.', 'assignment-support' ); ?></p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
