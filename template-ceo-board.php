<?php
/*
Template Name: Ceo and Board
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php
	//Gets a templated post from the ID
	$args = array (
	'post_type'                 => 'key_people',
	'p'                      => get_field('ceo'),
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
		$query->the_post(); 
			get_template_part('templates/content-page', 'acf-ceo'); 
		}
	}
	else {
		get_template_part('templates/content', 'no-posts');
	}
	// Restore original Post Data
	wp_reset_postdata()
?>
<hr>

<div class="container">
	<?php for ($i=0; $i < sizeof(get_field('people_repeater')); $i++) {
		$GLOBALS['people_id'] = get_field('people_repeater')[$i]['board_member']->ID;
		get_template_part('templates/content-page', 'acf-normal');
	} //For Loop ?>
</div>

<?php endwhile; ?>