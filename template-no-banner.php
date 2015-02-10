<?php
/*
Template Name: Default - No Banner with Form
*/
?>
<?php while (have_posts()) : the_post(); ?>
 <article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<?php get_template_part('templates/content-header', 'text'); ?>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php if (roots_display_sidebar()) : ?>

			<div class="col-xs-8">
				<?php get_template_part('templates/content', 'lead'); ?>
				<?php the_content(); ?>

			</div>
			<div class="col-sm-4">
		        <aside class="sidebar" role="complementary">
		          <?php dynamic_sidebar('sidebar-contact'); ?>
		        </aside><!-- /.sidebar -->
		    </div>
		    <?php else: ?>

			<div class="col-xs-12">
				<?php the_content(); ?>
			</div>

		  	<?php endif; ?>
		</div>
	</div>
</article>
<?php endwhile; ?>