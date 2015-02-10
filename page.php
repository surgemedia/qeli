<?php while (have_posts()) : the_post(); ?>
 <article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background" style="background-image:url('<?php 
			$id = get_post_thumbnail_id();
			echo wp_get_attachment_image_src($id, 'full')[0];
		?>')">
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
			
			<div class="col-xs-12 <?php if (get_field('aside')) { echo 'col-sm-8'; } ?>">
				<?php the_content(); ?>

			</div>

			<?php if (roots_display_sidebar()) : ?>
			<div class="col-xs-12 col-sm-4">
		        <aside class="sidebar" role="complementary">
		          <?php include roots_sidebar_path(); ?>
		        </aside><!-- /.sidebar -->
		    </div>
		  	<?php endif; ?>
		</div>
	</div>
</article>
<?php endwhile; ?>