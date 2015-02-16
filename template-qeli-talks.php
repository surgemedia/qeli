<?php
/*
Template Name: Qeli Talks/Videos
*/
?>
<?php while (have_posts()) : the_post(); ?>
<article id="content" class="col-xs-12">
	<div class="row">
		<?php $featured_id = get_field('featured_video')->ID; ?>
		<?php if(get_field('featured_video')) {?>
		<div class="page-header colored-background image-background" style="background-image:url('<?php
				$id = get_post_thumbnail_id();
				echo wp_get_attachment_image_src($id, 'full')[0];
			?>')">
			<?php } else { ?>
			<div class="page-header colored-background image-background" style="background-image:url('<?php echo getFeaturedUrl($featured_id);?>')">
				<?php } ?>
				<?php get_template_part('templates/page', 'colored-header'); ?>
				<?php // output the text in the banner
				if( get_field( "banner_text" ) ):
				?>
				<div class="container">
					<p><?php the_field( "banner_text" ); ?></p>
				</div>
				<?php endif;?>
				<?php if(get_field('featured_video')) {
					$video_id = get_field('embed_code',$featured_id);
				?>
				<a href="#" class="video-popup-thumbnail" data-url="//www.youtube.com/embed/<?php echo cleanYoutubeLink($video_id); ?>" data-modal="#videoModal" data-width="400" data-height="225" role="button">
					<span class="graphic btn-play-lg"></span>
				</a>
				<?php } ?>
				<?php if(get_field('featured_video')) {?>
				<div class="banner-video-title">
					<div class="container header-text">
						<h2 class="video-name"><?php echo get_the_title($featured_id); ?></h2>
						<?php /* <span class="date-time"><?php echo get_the_date('F j');  ?></span> */ ?>
					</div>
				</div>
				<?php } ?>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php the_content(); ?>
					</div>
					<hr class="spacer">
					<?php
					// WP_Query arguments
					$args = array (
						'post_type' => 'videoes',
					
						);
					// The Query
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
							echo $post->current_post;
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