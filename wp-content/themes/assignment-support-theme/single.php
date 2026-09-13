<?php
/** Single blog article. @package Assignment_Support */
get_header();
?>
<main id="primary" class="site-main content-area">
	<div class="container prose">
		<p><a href="<?php echo esc_url( assignment_support_blog_url() ); ?>"><?php esc_html_e( 'Back to blog', 'assignment-support' ); ?></a></p>
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<h1><?php echo esc_html( get_the_title() ); ?></h1>
					<p class="post-meta"><?php echo esc_html( get_the_date() ); ?></p>
					<?php if ( has_post_thumbnail() ) : ?>
						<?php echo get_the_post_thumbnail( get_the_ID(), 'large' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WordPress generates escaped image markup. ?>
					<?php endif; ?>
				</header>
				<div class="entry-content"><?php the_content(); ?></div>
			</article>
			<nav class="post-navigation" aria-label="<?php esc_attr_e( 'Article navigation', 'assignment-support' ); ?>"><?php the_post_navigation(); ?></nav>
		<?php endwhile; ?>
	</div>
</main>
<?php get_footer(); ?>
