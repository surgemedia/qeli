<?php
/*
Template Name: Courses Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
<div class="colored-background">
<div class="container">
		<h1><?php the_title(); ?></h1>
	</div>
	<div class="featured-image">
    <div class="featured-text">
      <?php  get_template_part('templates/content', 'featured-program'); ?>
    </div>
  </div>
  
	<?php endwhile; ?>
	<?php  get_template_part('templates/template-post-loop', 'courses'); ?>
</div>