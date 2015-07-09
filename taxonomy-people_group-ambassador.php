
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
	
		<?php while (have_posts()) : the_post(); ?>
			<div class="container">
			<?php  get_template_part('templates/content-taxonomy', 'ambassador'); ?>
			</div>
			<hr>
		<?php endwhile; ?>
</article>