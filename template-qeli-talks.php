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
		<div class="page-header colored-background image-background overlay" style="background-image:url('<?php
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
				<div class="container header-text">
					<?php the_field( "banner_text" ); ?>
				</div>
				<?php endif;?>
				<?php if(get_field('featured_video')) {
					$video_id = get_post_meta($featured_id)['talks_0_embed_code'][0];
					//debug(get_post_meta($featured_id)['talks_0_embed_code'][0]);
					
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
					<div class="col-lg-2 col-sm-2 col-xs-2">
					<div class="row">

						<ul class="video-filter">
							<li><a href="#" class="selected" data-term="clear">All Videos</a></li>
							<?php
							$args = array( 'hide_empty=0' );
							$terms = get_terms( 'video_tag', $args );
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								$count = count( $terms );
								$i = 0;
								$term_list = "";
								foreach ( $terms as $term ) {
									$i++;
									$term_list .= '<li><a data-term="' . $term->name . '" href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a></li>';
									
									if ( $count != $i ) {

									}
									else {

									}
								}
								echo $term_list;
							}?>
						</ul>
					</div>
				</div>

					<div class=" col-sm-10 col-xs-12">
						<?php the_content(); ?>
					</div>
					<hr class="spacer">
					<div class="col-xs-12 col-lg-10">
					<?php
					// WP_Query arguments
					$args = array (
						'post_type' => 'videoes',
						'posts_per_page'         => -1,
						'orderby'         => 'date',
						'order'         => 'ASC',


						'meta_query'    => array(
						
						array( 'key' => 'featured',
							'value'     => 0,)
												),
						);
					// The Query
					$query = new WP_Query( $args );
					if ( $query->have_posts() ) {

						$i = 0;

						while ( $query->have_posts() ) {
							$i++;
							$query->the_post();
							echo $post->current_post;
							get_template_part('templates/content-post-type', 'video');

							if ($i%2 == 0) {
								echo '<div class="clearfix"></div>';
							}
						}
					} else {
					}
					// Restore original Post Data
					wp_reset_postdata();
					?>
				</div>
				</div>
			</div>
		</article>
		<?php endwhile;