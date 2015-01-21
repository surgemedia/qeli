<h2>Testimonial</h2>
<?php  
//Gets a templated post from the ID
$args = array (
        'post_type'                 => 'testimonial',
        'p'                      	=> get_field('featured_testimonial'),

        );
        // The Query
        $query = new WP_Query( $args );
        // The Loop
        if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
        $query->the_post();
        get_template_part('templates/content-post-type-post-block', 'testimonial');     
        }
        } else {
        get_template_part('templates/content', 'no-posts'); 
        }
        // Restore original Post Data
        wp_reset_postdata()
  
?>