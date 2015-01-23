<?php
/*
Template Name: About - People
*/
?>
<?php while (have_posts()) : the_post(); ?>
<article id="content" class="col-xs-12">
	<div class="row">
		<div class="colored-background">
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container">
				<p>
				<?php the_content(); ?>
				</p>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="">
			<div class="col-sm-2">
				<ul>
					<?php
					$args = array( 'hide_empty=0' );
					$terms = get_terms( 'people_group', $args );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					$count = count( $terms );
					$i = 0;
					$term_list = "";
						foreach ( $terms as $term ) {
						$i++;
						$term_list .= '<li><a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a></li>';
						if ( $count != $i ) {
						
						}
						else {
					
					}
					}
					echo $term_list;
					}
					?>
				</ul>
				<hr>
				<ul>
				<?php
				$acf_people = get_field('key_people');
				 for ($i=0; $i < sizeof($acf_people); $i++) { ?>
				 <?php 
				 	$acf_person = get_post(get_field('key_people')[$i]);
				 	$acf_person_link = get_permalink(get_field('key_people')[$i]); ;
					
				?>
					<li><a href="<?php echo $acf_person_link; ?>" class="person-control" data-item="person-<?php echo $i+1; ?> "><?php echo $acf_person->post_title;  ?></a></li>



				<?php } ?>
					
				</ul>
			</div>
			<div class="col-sm-10">
				<?php 
				// WP_Query arguments
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
						if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
						$query->the_post();
						get_template_part('templates/content-post-type','people');
						}
						} else {
						get_template_part('templates/content', 'no-posts');
						}
						// Restore original Post Data
						wp_reset_postdata();
						// WP_Query arguments
				?>
			</div>
		</div>
	</div>
</article>
<?php endwhile;