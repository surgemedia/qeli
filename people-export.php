<?php
/*
Template Name: About - People Export
*/
?>
<?php while (have_posts()) : the_post(); ?>
<article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container">
				<p>
				<?php the_content(); ?>
				</p>
			</div>
		</div>
	</div>
	
	
				<div class="row">
					<div class="container">
					<h1>Facilitator</h1>
						<?php
						//Gets a templated post from the ID
							$args = array (
							'post_type'              => 'key_people',
							'people_group'               => 'facilitator',
							'pagination'             => true,
							'posts_per_page'         => -1,
							'order'                  => 'DESC',
							'orderby'                => 'title',
							);
						
						// The Query
						$query = new WP_Query( $args );
						// The Loop
						if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						
						 ?>
						<div class="row">
						<pre class="col-lg-3">Name: <?php echo the_title(); ?> </pre>
						<pre class="col-lg-3"> ID: <?php echo the_id(); ?></pre>

						
						</div>

						
						<?php  }
						}
						else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
						wp_reset_postdata();
						?>
						<h2>All People</h2>
						<?php
						//Gets a templated post from the ID
							$args = array (
							'post_type'              => 'key_people',
							//'tag_name'               => 'test',
							'pagination'             => true,
							'posts_per_page'         => -1,
							'order'                  => 'DESC',
							'orderby'                => 'title',
							);
						
						// The Query
						$query = new WP_Query( $args );
						// The Loop
						if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						
						 ?>
						<div class="row">
						<pre class="col-lg-2">Name: <?php echo the_title(); ?> </pre>
						<pre class="col-lg-2"> ID: <?php echo the_id(); ?></pre>
						
						</div>

						
						<?php  }
						}
						else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
						wp_reset_postdata();
						?>
						
						
					</div>
				
			
		</div>
	</article>
	<?php endwhile;