<div class="row">
	<div class="person">
		<div class="col-xs-12 col-sm-3">
			<img src="<?php echo getFeaturedUrl() ?>" class="img-responsive img-circle" alt="<?php the_field('name') ?>">
		</div>
		<div class="col-xs-12 col-sm-9">
			<h2><?php the_title() ?></h2>
			<?php if(get_field('qualifications')) { ?>
			<div class="meta-qualifications"><?php echo get_field('qualifications') ?></div>
			<?php } ?>
			<?php if(get_field('author_role')) { ?>
			<div class="meta-title h3"><?php echo get_field('author_role'); ?></div>
			<?php } ?>
			<?php echo get_field('biography') ?>
			<?php /* ?>
			<div class="meta-special">
				<h3>Special Responsibilities:</h3>
				<?php echo get_field('special_responsibilities') ?>
			</div>
			<?php */ ?>
		</div>
	</div>
</div>
