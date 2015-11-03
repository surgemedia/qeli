<?php
/*
Template Name: Courses Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
<div class="page-header colored-background image-background overlay" style="background-image:url('<?php 
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
		?>')">

	<?php get_template_part('templates/page', 'colored-header'); ?>
		<div class="container">
			<div class="header-text">
				<?php the_content(); ?>
				<br>
			</div>
		</div>
		<?php //get_template_part('templates/content', 'featured-program'); ?>
		<?php //get_template_part('templates/content', 'featured-Testimonial'); ?>
	<?php endwhile; ?>
	
</div>

<?php  get_template_part('templates/template-post-loop', 'courses'); ?>