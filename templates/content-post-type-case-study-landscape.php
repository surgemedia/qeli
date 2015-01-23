<div class="case-study section">
	<h2>Case Study</h2>
	<p><?php  echo truncate(get_field('program'),30,'...' ) ?></p>
	<blockquote>
		<p><?php echo truncate(get_field('outcome'),30,'...' ) ?></p>
	</blockquote>
	<p class="author-meta">
	<strong><?php echo get_field('author')[0]['name']; ?></strong><br>
	<?php echo get_field('author')[0]['position']; ?>
	</p>
	<a href="<?php echo get_permalink(); ?>"><span class="graphic icon-read-more"></span> Read more</a>
	
</div>