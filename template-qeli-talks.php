<?php
/*
Template Name: Qeli Talks/Videos
*/
?>
<?php while (have_posts()) : the_post(); ?>
<article id="content" class="col-xs-12">
	<div class="row">
	<?php $featured_id = get_field('featured_video')->ID; ?>
	<?php if(0 == strlen(get_field('featured_video'))) {?>
		<div class="page-header colored-background image-background" style="background-image:url('<?php 
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
		?>')">
		<?php } else { ?>
		<div class="page-header colored-background image-background" style="background-image:url('<?php 
			echo getFeaturedUrl($featured_id);
		?>')">
		<?php } ?>
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container">
			<?php if(0 != strlen(get_field('featured_video') )) {?>
			<!-- @jakew Duplicate Title? -->
			<h2><?php echo get_the_title($featured_id); ?></h2>
		<div class="video-modal graphic btn-play-sm" data-modal="#videoModal" data-src="//www.youtube.com/embed/<?php echo cleanYoutubeLink(get_field('embed_code',$featured_id)); ?>">
			<?php } else { ?>
			<?php the_content(); ?>
			<?php } ?>
			</div>
		</div>
	</div>
	<?php if(0 != strlen(get_field('featured_video') )) {?>
	<div class="container">
	<!-- @jakew Duplicate Title? -->
		 <h2 class="video-name"><?php echo get_the_title($featured_id); ?></h2>
		 <span class="date-time"><?php echo get_the_date('F j');  ?></span>
		  <p><?php echo truncate(get_field('description',$featured_id),25,"..."); ?>
	</div>
	<?php } ?>
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