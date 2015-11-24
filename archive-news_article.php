
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
						get_template_part('templates/content-post-type-post-block-news', 'listing');
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
                    <section class="widget search-2 widget_search">
                        <?php
                           get_template_part('templates/searchform');
                        ?>
                    </section>
                    <section class="widget archives widget_archive">
                        <?php
                       	  $archive_pt = 'news_article';
                           include(locate_template('templates/part-archive_tax-list.php'));
                            unset($archive_pt );

                        ?>
                    </section>
                    </aside><!-- /.sidebar -->
	  			<?php endif; ?>
			</div>
		</div>
	</div>