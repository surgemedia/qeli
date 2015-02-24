<div class="featured-testimonial">
	<h3>Testimonial</h3>
	<p><?php the_content();
	 ?>
	<div class="meta">
		<?php the_title(); ?><br>
		<?php the_field('author_role'); ?><br>
		<?php the_field('author_institution'); ?>
	</div>
</div>