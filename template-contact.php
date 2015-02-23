<?php
/*
Template Name: Contact
*/
?>
<?php while (have_posts()) : the_post(); ?>
 <article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container">

				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<h3>Address</h3>
						<?php the_field('address'); ?>

						<h3>Postal</h3>
						<?php the_field('postal'); ?>

						<h3>Contact</h3>
						<?php the_field('contact'); ?>

						<h3>Visit</h3>
						<?php the_field('homepage'); ?>
						<h3>Connect with us</h3>
						<div class="social-icons">
							<span class="graphic arrow-right-circle"></span>
							<?php if (get_field('facebook_link')): ?>
								<a href="<?php the_field('facebook_link'); ?>" target="_blank" class="graphic icon-facebook"></a>
							<?php endif; ?>
							<?php if (get_field('twitter_link')): ?>
								<a href="<?php the_field('twitter'); ?>" target="_blank" class="graphic icon-twitter"></a>
							<?php endif; ?>
							<?php if (get_field('linkedin_link')): ?>
								<a href="<?php the_field('linkedin_link'); ?>" target="_blank" class="graphic icon-linkedin"></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="row">
						<?php
							$location = get_field('map_location');
							if( !empty($location) ):
						?>
						<div class="page-map">
							<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-xs-12 col-sm-6">
				<div class="row">
					<h3>Send us an email</h3>
					<?php echo do_shortcode('[gravityform id=1 title=false description=false ajax=true]');?>
				</div>
			</div>
			<?php /* ?>
			<div class="col-xs-12 col-sm-6">
				<div class="row">
					<img src="<?php
								$id = get_post_thumbnail_id();
								echo wp_get_attachment_image_src($id, 'full')[0];
							?>" class="img-responsive feat-img"/>
				</div>
			</div>
			<?php */ ?>
		</div>
	</div>
</article>
<?php endwhile; ?>