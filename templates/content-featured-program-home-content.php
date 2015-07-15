<h3><?php the_title(); ?></h3>
<?php 
	$sc = strip_tags(get_field('executive_summary'));
	echo "<span>".$sc."</span>";
 ?>
<strong>
	Next Program: <?php echo get_field('instances',$post)[0]['instances_name'];  ?>
</strong>
<br>
<br>
