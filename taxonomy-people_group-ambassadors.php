
<article id="content" class="col-xs-12">
	<div class="row">
		<div class="colored-background">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container">
				<p>
				<?php echo term_description(); ?>
				</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="container">
		<?php while (have_posts()) : the_post(); ?>
			<?php  get_template_part('templates/content-taxonomy', 'ambassador'); ?>
		<?php endwhile; ?>
		</div>
	</div>
</article>