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
	<div class="featured-image">
    <div class="featured-text">
      <div class="col-xs-12 col-sm-4 text-blue">
        The Middle Leadership Program from QELi fast-tracked my development.
        <br><a href="#" class="btn btn-default">More about this program</a>
      </div>
    </div>
  </div>
  
	<?php endwhile; ?>
	<?php  get_template_part('templates/template-post-loop', 'courses'); ?>
</div>