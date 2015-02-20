<div class="col-xs-12 col-sm-6">
			<div class="person">
				<img src="<?php echo getFeaturedUrl() ?>" class="img-responsive img-circle hidden-xs" alt="<?php the_field('name') ?>">
				<h2><?php the_title() ?></h2>
				<div class="meta-qualifications"><?php echo get_field('qualifications') ?></div>
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
