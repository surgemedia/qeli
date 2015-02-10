<?php
/*
Template Name: Qeli Talks/Videos
*/
?>
<?php while (have_posts()) : the_post(); ?>
<article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background" style="background-image:url('<?php 
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
		<div class="container">
			<?php
			// WP_Query arguments
			$args = array (
				'post_type' => 'videoes',
				'pagination'             => true,
				'posts_per_page'         => '6',

			);
			// The Query
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
			$query->the_post();
			get_template_part('templates/content-post-type', 'video');
			}
			} else {
			}
			// Restore original Post Data
			wp_reset_postdata();
			?>
		</div>
	</div>
</article>
<?php endwhile;