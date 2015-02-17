<div class="container">
	<div class="col-xs-12 col-sm-3">
		<img class="img-responsive img-circle" src="<?php echo getFeaturedUrl(); ?>" alt="<?php the_field('name') ?>">
	</div>
	<div class="col-xs-12 col-sm-9">
		<div class="meta-title h3 colored-text"><?php the_field('qualifications'); ?></div>
		<h2><?php the_title(); ?></h2>
		<div class="meta-title"><?php the_field('position') ?></div>
		<p>
		<?php the_field('short_description'); ?>
		</p>
	</div>
</div>