<h3><a href="#"><span class="graphic arrow-link"></span><?php the_title(); ?></a></h3>
<p><?php the_excerpt(); ?></p>
<p class="date">
	[<?php
		//Used post date but also have control for date published.
	 	echo get_the_date('F j'); 
	 ?>] <?php edit_post_link(); ?>
</p>