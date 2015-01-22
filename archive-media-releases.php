<article id="content" class="col-xs-12">
	<div class="row">
		<div class="colored-background">
			<div class="header">
				<div class="container">
					<h1>Media Releases</h1>
				</div>
			</div>
			<div class="container">
				<p>
				Sed tempor consectetur tellus quis egestas. Duis eu ornare ante. Donec aliquet sem vel mattis laoreet. Duis elementum ut mauris et laoreet. Sed commodo, nisi non commodo eleifend, mauris diam volutpat enim, viverra tristique ligula purus quis lorem.
				</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6">
				
				<?php
				// WP_Query arguments
				$args = array (
				'post_type'              => 'media_releases',
				'post_status'            => 'published',
				'pagination'             => false,
				'posts_per_page'         => '6',
				'orderby'                => 'date',
				);
				// The Query
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('templates/content-post-type-post', 'media-release');
						}
						} else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
					wp_reset_postdata();
				?>
				
			</div>
			<div class="col-xs-12 col-sm-6">
				<?php
				// WP_Query arguments
				$args = array (
				'post_type'              => 'media_releases',
				'post_status'            => 'published',
				'pagination'             => true,
				'posts_per_page'         => '6',
				'offset'                 => '6',
				'orderby'                => 'date',
				);
				// The Query
				$query = new WP_Query( $args );
				// The Query
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('templates/content-post-type-post', 'media-release');
						}
						} else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
					wp_reset_postdata();
				?>
				
			</div>
		</div>
	</div>
</article>