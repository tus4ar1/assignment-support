<?php /** Resources. @package Assignment_Support */ ?>
<section class="section" aria-labelledby="resources-title">
	<div class="container">
		<h2 id="resources-title"><?php esc_html_e( 'Learning resources and samples', 'assignment-support' ); ?></h2>
		<p><?php esc_html_e( 'Resources shared here are for learning and reference only. They must not be submitted as a student’s own work.', 'assignment-support' ); ?></p>
		<?php
		$recent_posts = new WP_Query( array( 'posts_per_page' => 3, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) );
		if ( $recent_posts->have_posts() ) :
			?>
			<div class="card-grid three-columns">
				<?php while ( $recent_posts->have_posts() ) : $recent_posts->the_post(); ?>
					<article class="card">
						<h3><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a></h3>
						<p><?php echo esc_html( get_the_date() ); ?></p>
						<p><?php echo esc_html( get_the_excerpt() ); ?></p>
					</article>
				<?php endwhile; ?>
			</div>
			<?php wp_reset_postdata(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Learning articles will be available here soon.', 'assignment-support' ); ?></p>
		<?php endif; ?>
		<p><a href="<?php echo esc_url( assignment_support_blog_url() ); ?>"><?php esc_html_e( 'Read all blog articles', 'assignment-support' ); ?></a></p>
	</div>
</section>
