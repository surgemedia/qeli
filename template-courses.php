<?php
/*
Template Name: Courses Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
<div class="page-header colored-background image-background" style="background-image:url('<?php 
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
		?>')">

	<?php get_template_part('templates/page', 'colored-header'); ?>
		<div class="container">
			<div class="featured-text">
				<?php the_content(); ?>
				<br>
				<?php $the_course = get_field('featured_program'); ?>
				<a href="<?php echo get_permalink($the_course); ?>" class="circle-more">
					More
				</a>
			</div>
		</div>
		<?php //get_template_part('templates/content', 'featured-program'); ?>
		<?php //get_template_part('templates/content', 'featured-Testimonial'); ?>
	<?php endwhile; ?>
	
</div>

<?php  get_template_part('templates/template-post-loop', 'courses'); ?>