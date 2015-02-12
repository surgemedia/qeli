<?php
/*
Template Name: Home Page
*/
?>
<?php while (have_posts()) : the_post(); ?>
<ul>
<?php
$repeater = get_field('template_selector');
for ($i=0; $i < sizeof($repeater); $i++) {
	echo "<li>";
	get_template_part('templates/template-block',$repeater[$i]['template_blocks']);
	echo "</li>";
}
?>

	<li>
		<div class="section home-footer" >
			<?php get_template_part('templates/footer'); ?>
		</div>
	</li>
</ul>
<?php endwhile; ?>
<?php wp_footer(); ?>