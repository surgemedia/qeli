<?php
/*
Template Name: Partners
*/
?>
<?php while (have_posts()) : the_post(); ?>
 <article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

	<?php 
	//Get the repeater
		$repeater = get_field('partners');
	//Order is empty for sorting
		$order = array();

		foreach( $repeater as $x => $row ) {
	//Order setup the order
		$order[ $x ] = $row['name'];
		} 
	//Sorts into Alphabetical 
		array_multisort( $order, SORT_ASC, $repeater );
		for ($i=0; $i < count($repeater); $i++):  
	?>
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-3">
						<img src="<?php $id = $repeater[$i]['image'];
								// TODO this is not returning the correct sized image
									echo wp_get_attachment_image_src($id, 'thumnbnail')[0];
						?>" class="img-responsive"/>
					</div>
					<div class="col-xs-12 col-sm-9">
						<!-- <div class="numbering"><?php // echo $i; ?></div> -->
						<h2><?php echo $repeater[$i]['name']; ?></h2>
						<?php echo $repeater[$i]['description']; ?>
						<a href="<?php the_sub_field('homepage'); ?>" target="_blank"><span class="graphic arrow-right-outline"></span><?php the_sub_field('homepage'); ?></a>
					</div>
				</div>
			</div>
			<hr>
	<?php endfor; ?>
</article>
<?php endwhile; ?>