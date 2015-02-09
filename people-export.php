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
	
	<div id="panel-info" class="col-xs-12 panel-info">
		<div class="panel-header clearfix">
			<button class="graphic icon-close pull-right"></button>
			<h2 class="panel-title pull-left"></h2>
		</div>
		<div class="panel-text clearfix"></div>
	</div>
	<div class="row">
		<div class="container">
			<div class="col-sm-2">
				<div class="row">
					
					<ul class="people-filter">
						<?php
						//Gets a templated post from the ID
							$args = array (
							'post_type'              => 'key_people',
							//'tag_name'               => 'test',
							'pagination'             => true,
							'posts_per_page'         => '25',
							'order'                  => 'DESC',
							'orderby'                => 'title',
							);
						
						// The Query
						$query = new WP_Query( $args );
						// The Loop
						if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post(); ?>
						<li><span><?php echo the_title(); ?> </span><pre> <?php echo the_id(); ?> </pre></li>
						<?php  }
						}
						else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
						wp_reset_postdata();
						?>
						
					</ul>
				</div>
			</div>
		</div>
	</article>
	<?php endwhile;