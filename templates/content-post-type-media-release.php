<?php
// JW - edited this to remove part of an unrequired check.
if( get_field('attachment') ){
	$filesize_kb = filesize(get_attached_file(get_field('attachment')['id']));
	$filesize = size_format($filesize_kb, 2);
};
?>
<div class="media-item">
	<?php if(!isset( get_field('attachment')['url'] ) ) { ?>
	<h2><a href="<?php the_permalink(); ?>"><span class="graphic arrow-link"></span><?php the_title(); ?></a></h2>
	<?php } else { ?>
	<h2><a href="<?php echo get_field('attachment')['url'] ?>"><span class="graphic arrow-link"></span><?php the_title(); ?></a></h2>
	<?php } ?>
	<p>
	<?php the_excerpt();
	?>
	</p>
	<?php if(!isset( get_field('attachment')['url'] ) ) { ?>
	<a href="<?php the_permalink(); ?>" class="media-link"><span class="graphic icon-read-more"></span>Read more</a>
	<?php } else { ?>
	<a href="<?php echo get_field('attachment')['url'] ?>" class="media-link">Download [PDF <?php echo $filesize; ?> ]</a>
	<?php } ?>
</div>