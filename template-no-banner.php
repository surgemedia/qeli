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
			<div class="container header-text">
				<?php if (get_field('header_text')): ?>
				<?php the_field('header_text'); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php if (roots_display_sidebar()) : ?>

			<div class="col-xs-8">
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