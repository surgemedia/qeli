<h2>Featured Program</h2>
<?php  
$the_id_fp = get_field('featured_program');
?>
<?php  
//Gets a templated post from the ID
$args = array (
        'post_type'                 => 'courses',
        'p'                      	=> get_field('featured_program'),

        );
        // The Query
        $query = new WP_Query( $args );
        // The Loop
        if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
        $query->the_post();
        get_template_part('templates/content', 'featured-program-content');     
        }
        } else {
        get_template_part('templates/content', 'no-posts'); 
        }
        // Restore original Post Data
        wp_reset_postdata()
  
?>


 