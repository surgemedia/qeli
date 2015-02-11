<?php
/*
Template Name: QELi News Letter
*/
?>
<?php while (have_posts()) : the_post(); ?>
<article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background overlay" style="background-image:url('<?php
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
		?>')">
			<?php get_template_part('templates/page', 'colored-header'); ?>
				<div class="container header-text">
				<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
	<hr>
	<?php get_template_part('archive', 'newsletter'); ?>
</article>
<?php endwhile; ?>