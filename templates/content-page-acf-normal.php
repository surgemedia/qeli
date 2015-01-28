<div class="col-xs-12 col-sm-6">
			<div class="person">
				<img src="<?php echo getFeaturedUrl($GLOBALS['people_id']) ?>" class="img-responsive img-circle hidden-xs" data-src="holder.js/140x140/auto" alt="140x140" data-holder-rendered="true">
				<h2><?php echo get_the_title($GLOBALS['people_id']) ?></h2>
				<div class="meta-qualifications"><?php echo get_field('qualifications',$GLOBALS['people_id']) ?></div>
				<div class="meta-title h3">Board Chair</div>
				<?php echo get_field('short_description',$GLOBALS['people_id']) ?>
				<div class="meta-special">
					<h3>Special Responsibilities:</h3>
					<?php echo get_field('special_responsibilities',$GLOBALS['people_id']) ?>
				</div>
			</div>
		</div>
