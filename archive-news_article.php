<article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background overlay" style="background-image:url('<?php
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
		?>')">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container">
				<p>
				<?php the_content(); ?>
				</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-9">
				<?php

				// TODO JW - this query should pull the news items published in the last 7 days
				// WP_Query arguments
				$args = array (
				'post_type'              => 'news_article',
				'pagination'             => false,
				'posts_per_page'         => '12',
				);
				// The Query
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('templates/content-post-type-post-block', 'news');
						}
						} else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
					wp_reset_postdata();
				?>
			</div>
			<div class="col-xs-12 col-sm-3">
			    <?php if (roots_display_sidebar()) : ?>
			        <aside class="sidebar" role="complementary">
			          <?php include roots_sidebar_path(); ?>
			        </aside><!-- /.sidebar -->
	  			<?php endif; ?>
			</div>
		</div>
	</div>
</article>