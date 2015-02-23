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
					'pagination'             => true,
						'posts_per_page'         => -1,
								'orderby'		=> 'meta_value_num',
									'meta_key'		=> 'date',
										'order'			=> 'DESC'
					);
					// The Query
					$query = new WP_Query( $args );
				?>
				<?php if(6 == $count){ ?>
			</div>
			<div class="col-xs-12 col-sm-6">
				<?php } ?>
				<?php
					if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								get_template_part('templates/content-post-type', 'media-release');
						$count++; ?>
						<?php if(6 == $count){ ?>
							</div>
							<div class="col-xs-12 col-sm-6">
						<?php } ?>
				<?php	}
				} else {
					get_template_part('templates/content', 'no-posts');
				}
					// Restore original Post Data
				wp_reset_postdata();
				?>
				
			</div>
			</div>
		</div>
	</div>
</article>
<?php endwhile;?>