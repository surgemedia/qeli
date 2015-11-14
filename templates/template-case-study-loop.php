<?php

				// TODO JW - this query should pull the news items published in the last 7 days
				// WP_Query arguments
				$args = array (
				'post_type'              => 'case_studies',
				'pagination'             => false,
				'posts_per_page'         => '12',
				);
				// The Query
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('templates/content-post-type-post', 'case-study');
						}
						} else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
					wp_reset_postdata();
				?>