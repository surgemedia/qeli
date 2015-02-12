<?php
/*
Template Name: Partners
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

	<?php if(have_rows('partners')): $i = 0; ?>
		<?php while(have_rows('partners')): the_row();?>
			<div class="container">
				<div class="row">
					<?php $i++; ?>
					<div class="col-xs-12 col-sm-3">
						<img src="<?php $id = get_sub_field('image');
									echo wp_get_attachment_image_src($id, 'thumnbnail')[0];
						?>" class="img-responsive"/>
					</div>
					<div class="col-xs-12 col-sm-9">
						<div class="numbering"><?php echo $i; ?></div>
						<h2><?php the_sub_field('name'); ?></h2>
						<?php the_sub_field('description'); ?>
						<a href="<?php the_sub_field('homepage'); ?>" target="_blank"><span class="graphic arrow-right-outline"></span><?php the_sub_field('homepage'); ?></a>
					</div>
				</div>
			</div>
			<hr>
		<?php endwhile; ?>
	<?php endif; ?>
</article>
<?php endwhile; ?>