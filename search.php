<?php
/*
	Search Results Page
*/
?>
 <article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background" style="background-image:url('<?php 
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
			// TODO @walt showing bg of last result.
		?>')">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container header-text">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			
			<div class="col-xs-12 <?php if (get_field('aside')) { echo 'col-sm-8'; } ?>">
		
		<?php while (have_posts()) : the_post(); ?>
				
		<?php get_template_part('templates/content-post-type', 'media-release'); ?>
		
		<?php endwhile; ?>

			</div>

			
		</div>
	</div>
</article>
