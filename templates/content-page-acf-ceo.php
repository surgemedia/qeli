<div class="person ceo">
	<div class="colored-background">
		<?php get_template_part('templates/page', 'colored-header'); ?>
		<div class="container">
			<div class="col-xs-12 col-sm-3">
				<img class="img-responsive img-circle hidden-xs" src="<?php echo getFeaturedUrl(); ?>" alt="<?php the_field('name') ?>">
			</div>
			<div class="col-xs-12 col-sm-9">
				<div class="meta-title h3"><?php the_field('qualifications'); ?></div>
				<h2><?php the_field('name') ?></h2>
				<div class="meta-title"><?php the_field('position') ?></div>
				<p>
				<?php the_field('short_description'); ?>
				</p>
			</div>
		</div>
	</div>
	<div class="container">
	<?php the_field('biography'); ?>
		<div class="meta-email">
			<h3>Email</h3>
			<a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
		</div>
	</div>
</div>