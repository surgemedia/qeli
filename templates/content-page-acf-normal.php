<div class="col-xs-12 col-sm-6">
	<div class="person">
		<img src="<?php echo getFeaturedUrl($GLOBALS['people_id']) ?>" class="img-responsive img-circle" alt="<?php the_field('name') ?>">
		<h2><?php echo get_the_title($GLOBALS['people_id']) ?></h2>
		<?php if (get_field('qualifications',$GLOBALS['people_id'])): ?>
			<div class="meta-qualifications"><?php echo get_field('qualifications',$GLOBALS['people_id']) ?></div>
		<?php endif; ?>
		<?php if(get_field('author_role',$GLOBALS['people_id'])) { ?>
		<div class="meta-title h3 colored-text"><?php echo get_field('author_role',$GLOBALS['people_id']); ?></div>
		<?php } ?>
		<?php echo get_field('biography',$GLOBALS['people_id']) ?>

		<?php /* if (get_field('special_responsibilities',$GLOBALS['people_id'])): ?>
			<div class="meta-special">
				<h3>Special Responsibilities:</h3>
				<?php echo get_field('special_responsibilities',$GLOBALS['people_id']) ?>
			</div>
		<?php endif; */ ?>
	<?php edit_post_link('Edit profile','','',$GLOBALS['people_id']); ?>
	</div>
</div>
