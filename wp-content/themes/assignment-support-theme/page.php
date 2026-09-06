<?php
/**
 * Standard page template.
 *
 * @package Assignment_Support
 */

get_header();
?>
<main id="primary" class="site-main content-area">
	<div class="container prose">
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1><?php the_title(); ?></h1>
				<div class="entry-content"><?php the_content(); ?></div>
			</article>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();

