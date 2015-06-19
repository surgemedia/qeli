<?php
/*
Template Name: Search Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
 <article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background" style="background-image:url('<?php 
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
			// TODO @walt showing bg of last result?
		?>')">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container header-text">
			<?php the_content( ); ?>
				<?php get_search_form(); ?>
			

			</div>
		</div>

	</div>
	
</article>
<?php endwhile; ?>