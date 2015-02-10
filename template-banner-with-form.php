<?php
/*
Template Name: Default - Banner with Form
*/
?>
<?php while (have_posts()) : the_post(); ?>
 <article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background" style="background-image:url('<?php
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
		?>')">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<?php get_template_part('templates/content-header', 'text'); ?>
		</div>
	</div>
	<div class="container">
		<div class="row">

			<div class="col-xs-8">
				<?php get_template_part('templates/content', 'lead'); ?>
				<?php the_content(); ?>

			</div>


			<div class="col-sm-4">
		        <aside class="sidebar" role="complementary">
		          <?php dynamic_sidebar('sidebar-contact'); ?>
		        </aside><!-- /.sidebar -->
		    </div>
		</div>
	</div>
</article>
<?php endwhile; ?>