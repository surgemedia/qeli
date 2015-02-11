<div class="row facilitator-item">
	<div class="hidden-xs col-sm-2">
		<img src="<?php echo getFeaturedUrl($GLOBALS['facilitator']) ?>" alt="200x200" class="img-circle img-responsive" data-src="<?php echo getFeaturedUrl() ?>" data-holder-rendered="true">
	</div>
	<div class="col-xs-12 col-sm-8">
		<h3 class="author-name"><?php echo get_the_title($GLOBALS['facilitator']); ?></h3>
		<div class="item-text">
			<?php echo get_field('short_description',$GLOBALS['facilitator'])?>
		</div>
	</div>
</div>