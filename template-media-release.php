<?php
/*
Template Name: Media Releases
*/
?>
<?php while (have_posts()) : the_post(); ?>
<article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background overlay" style="background-image:url('<?php 
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
		?>')">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container header-text">
				<p>
				<?php the_content(); ?>
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
				'pagination'             => false,
				'posts_per_page'         => '6',
				'orderby'                => 'date',
				);
				// The Query
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('templates/content-post-type', 'media-release');
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
						get_template_part('templates/content-post-type', 'media-release');
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
<?php endwhile;?>