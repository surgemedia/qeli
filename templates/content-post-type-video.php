<div class="video-item">
	<h2><?php the_title(); ?></h2>
	<?php
	for ($i=0; $i < sizeof(get_field('talks')); $i++) { ?>
	<div class="embed-responsive embed-responsive-16by9">
		<iframe allowfullscreen="" frameborder="0" height="315" src="//www.youtube.com/embed/<?php echo cleanYoutubeLink(get_field('talks')[$i]['embed_code']); ?>" width="560"></iframe>
	</div>
	<?php	} ?>
	
</div>