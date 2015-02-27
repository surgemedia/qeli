<h3><?php the_title(); ?></h3>
<?php the_field('executive_summary'); ?>
<strong>
	Next Program: <?php echo get_field('instances',$post)[0]['instances_name'];  ?>
</strong>
<br>
<br>
