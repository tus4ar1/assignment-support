<?php
/** Blog archive. @package Assignment_Support */
get_header();
$posts_page = (int) get_option( 'page_for_posts' );
$title      = $posts_page ? get_the_title( $posts_page ) : __( 'Blog', 'assignment-support' );
?>
<main id="primary" class="site-main content-area">
	<div class="container prose">
		<h1><?php echo esc_html( $title ); ?></h1>
		<p><?php esc_html_e( 'Practical articles to help you learn, research and improve your own work.', 'assignment-support' ); ?></p>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-summary' ); ?>>
					<?php if ( has_post_thumbnail() ) : ?>
						<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo get_the_post_thumbnail( get_the_ID(), 'medium_large', array( 'loading' => 'lazy' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- WordPress generates escaped image markup. ?></a>
					<?php endif; ?>
					<h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h2>
					<p class="post-meta"><?php echo esc_html( get_the_date() ); ?></p>
					<p><?php echo esc_html( get_the_excerpt() ); ?></p>
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read article', 'assignment-support' ); ?><span class="screen-reader-text">: <?php echo esc_html( get_the_title() ); ?></span></a>
				</article>
			<?php endwhile; ?>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'There are no articles yet. Please check back soon.', 'assignment-support' ); ?></p>
		<?php endif; ?>
	</div>
</main>
<?php get_footer(); ?>
