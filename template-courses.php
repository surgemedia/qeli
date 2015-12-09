<?php
/*
Template Name: Courses Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
<div class="row">
			<div class="page-header colored-background">
				<?php get_template_part('templates/page', 'colored-header'); ?>
				<div class="container">
					<p>
						<?php the_content(); ?>
					</p>
				</div>
			</div>
		</div>
		<?php //get_template_part('templates/content', 'featured-program'); ?>
		<?php //get_template_part('templates/content', 'featured-Testimonial'); ?>
	<?php endwhile; ?>

	
</div>

<?php  get_template_part('templates/template-post-loop', 'courses'); ?>