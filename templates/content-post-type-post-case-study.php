<?php 
	if(0 != strlen( get_field('body_text')) OR 0 != strlen( get_field('header_text')) ){ 
		$the_link = get_the_permalink(); } else { $the_link = 'javascript:void(0)'; }
 ?>
<h3>
<a href="<?php echo $the_link; ?>">
<span class="graphic arrow-link"></span> <?php the_title(); ?></a>
</h3>
<?php if( get_field( "published_in" ) ): ?>
<p class="original-author"><?php the_field('published_in'); ?> | <?php the_field('date_of_publication'); ?></p>
<?php endif;?>
<p><?php the_excerpt(); ?></p>

<p><?php edit_post_link(); ?></p>
<hr> 

