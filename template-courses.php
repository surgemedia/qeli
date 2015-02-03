<?php
/*
Template Name: Courses Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
<div class="colored-background">
	<?php get_template_part('templates/page', 'colored-header'); ?>
	<div class="featured-image">
		<div class="container">
			<div class="featured-text">
				The Middle Leadership Program from QELi fast-tracked my development.
				<br>
				<a href="#" class="circle-more">
					More
				</a>
			</div>
		</div>
	</div>
		<?php //get_template_part('templates/content', 'featured-program'); ?>
		<?php //get_template_part('templates/content', 'featured-Testimonial'); ?>
	<?php endwhile; ?>
	
</div>

<?php  get_template_part('templates/template-post-loop', 'courses'); ?>