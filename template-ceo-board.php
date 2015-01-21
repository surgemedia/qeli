<?php
/*
Template Name: Ceo and Board
*/
?>
<?php while (have_posts()) : the_post(); ?>
	<?php  //debug(get_field('people_repeater')); ?>
	<?php for ($i=0; $i < sizeof(get_field('people_repeater')); $i++) { 
	$GLOBALS['people_count'] = $i;
	if(0 == $i){ get_template_part('templates/content-page', 'acf-ceo'); ?>
 		<hr>
 		<div class="row">
	<div class="container">
 	<?php } else { 
 		get_template_part('templates/content-page', 'acf-normal'); 
		} //Else 
	} //For Loop
	?>
	</div>
</div>

	
<?php endwhile; ?>
