<?php
/**
 * Front page template.
 *
 * @package Assignment_Support
 */

get_header();
?>
<main id="primary" class="site-main">
	<?php
	$sections = array(
		'hero',
		'trust-indicators',
		'problems-solutions',
		'services',
		'process',
		'reasons',
		'subjects-software',
		'specialists',
		'resources',
		'testimonials',
		'pricing',
		'integrity',
		'faq',
		'final-cta',
	);

	foreach ( $sections as $section ) {
		get_template_part( 'template-parts/home/' . $section );
	}
	?>
</main>
<?php
get_footer();

