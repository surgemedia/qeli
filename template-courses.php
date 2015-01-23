<?php
/*
Template Name: Courses Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
<div class="colored-background">
	<?php get_template_part('templates/page', 'colored-header'); ?>
	<div class="container">
		<?php  get_template_part('templates/content', 'featured-program'); ?>
		<?php get_template_part('templates/content', 'featured-Testimonial'); ?>
	</div>
	<?php endwhile; ?>
	<?php  get_template_part('templates/template-post-loop', 'courses'); ?>
</div>