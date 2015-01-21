<h3><?php echo  the_title(); ?></h3>
<?php the_field('executive_summary',$post->ID); ?>
<a href="?php the_permalink(); ?>">Read More</a>