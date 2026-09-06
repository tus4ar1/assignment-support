<?php /** Services. @package Assignment_Support */ ?>
<section class="section section-muted" aria-labelledby="services-title">
	<div class="container">
		<p class="eyebrow"><?php esc_html_e( 'Academic-support services', 'assignment-support' ); ?></p>
		<h2 id="services-title"><?php esc_html_e( 'Support matched to your learning needs', 'assignment-support' ); ?></h2>
		<div class="card-grid three-columns">
			<?php
			$services = array(
				__( 'Tutoring and concept guidance', 'assignment-support' ),
				__( 'Planning and research guidance', 'assignment-support' ),
				__( 'Editing and proofreading', 'assignment-support' ),
				__( 'Referencing support', 'assignment-support' ),
				__( 'Data-analysis assistance', 'assignment-support' ),
				__( 'Presentation and feedback support', 'assignment-support' ),
			);
			foreach ( $services as $service ) :
				?>
				<article class="card"><h3><?php echo esc_html( $service ); ?></h3><p><?php esc_html_e( 'Guidance is educational and designed to help you develop your own work.', 'assignment-support' ); ?></p></article>
			<?php endforeach; ?>
		</div>
	</div>
</section>

