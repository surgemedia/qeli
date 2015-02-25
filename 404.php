 <article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background" style="background-image:url('<?php
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
		?>')">
			<?php get_template_part('templates/page', 'colored-header'); ?>

  <?php _e('Sorry, but the page you were trying to view does not exist.', 'roots'); ?>
		<div class="container">
  
<ul>
  <li><?php _e('a mistyped address', 'roots'); ?></li>
  <li><?php _e('an out-of-date link', 'roots'); ?></li>
</ul>

<?php get_search_form(); ?>
</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php get_template_part('templates/content', 'lead'); ?>
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</article>

