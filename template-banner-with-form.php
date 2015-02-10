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

			<div class="col-xs-12 col-sm-8">
				<?php get_template_part('templates/content', 'lead'); ?>
				<?php the_content(); ?>

			</div>


			<div class="col-xs-12 col-sm-4 panel-aside">
		        <?php get_template_part('templates/sidebar', 'contact'); ?>
		    </div>
		</div>
	</div>
</article>
<?php endwhile; ?>