<div class="container header-text">
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<?php if (get_field('header_text')): ?>
			<?php if(false != get_field('has_header_text')) { ?>
			<?php the_field('header_text'); ?>
			<?php } ?>
			<?php endif; ?>
		</div>
	</div>
</div>