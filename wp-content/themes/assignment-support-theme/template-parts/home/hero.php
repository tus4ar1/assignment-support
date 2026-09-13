<?php
/** Hero and enquiry area. @package Assignment_Support */
?>
<section class="hero section" aria-labelledby="hero-title">
	<div class="container hero-grid">
		<div>
			<p class="eyebrow"><?php esc_html_e( 'Ethical academic support', 'assignment-support' ); ?></p>
			<h1 id="hero-title"><?php esc_html_e( 'Build confidence in your academic work', 'assignment-support' ); ?></h1>
			<p class="lead"><?php esc_html_e( 'Get guidance with planning, research, editing, referencing and data analysis while keeping your work your own.', 'assignment-support' ); ?></p>
			<div class="button-group">
				<a class="button" href="#enquiry"><?php esc_html_e( 'Get a Free Support Plan', 'assignment-support' ); ?></a>
				<a class="button button-secondary" href="https://wa.me/917878273480" target="_blank" rel="noreferrer"><?php esc_html_e( 'WhatsApp now', 'assignment-support' ); ?></a>
			</div>
		</div>
		<div class="enquiry-card" id="enquiry">
			<h2><?php esc_html_e( 'Tell us what support you need', 'assignment-support' ); ?></h2>
			<?php
			if ( shortcode_exists( 'assignment_support_enquiry_form' ) ) {
				echo do_shortcode( '[assignment_support_enquiry_form]' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Shortcode renders escaped fields and markup.
			} else {
				echo '<p>' . esc_html__( 'Please contact us on WhatsApp while the enquiry form is being set up.', 'assignment-support' ) . '</p>';
			}
			?>
		</div>
	</div>
</section>
