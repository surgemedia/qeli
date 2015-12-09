<div class="news-obj">
<div class="col-xs-3">
<div class="img-circle">
<img class=" img-responsive pull-left" src="<?php echo getFeaturedUrl(get_the_ID(),'Full'); ?> " alt="<?php the_title(); ?>">
</div>
</div>
<div class="col-xs-9">
<h3><a href="<?php the_permalink(); ?>"><span class="graphic arrow-link"></span> <?php the_title(); ?></a></h3>
<p><?php the_excerpt(); ?></p>
<p class="date">
	[<?php
		//Used post date but also have control for date published.
	 	echo get_the_date('F j');
	 ?>] <?php edit_post_link(); ?>
</p>
</div>
</div>