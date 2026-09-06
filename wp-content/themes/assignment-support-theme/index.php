<?php
/**
 * Fallback index template.
 *
 * @package Assignment_Support
 */

get_header();

$archive_title = is_home() ? single_post_title( '', false ) : __( 'Latest articles', 'assignment-support' );
if ( empty( $archive_title ) ) {
	$archive_title = __( 'Latest articles', 'assignment-support' );
}
?>
<main id="primary" class="site-main content-area">
	<div class="container prose">
		<h1><?php echo esc_html( $archive_title ); ?></h1>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-summary' ); ?>>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_excerpt(); ?>
				</article>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'No content is available yet.', 'assignment-support' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
