 <div class="section testimonials blue" >
          <div class="container center-all">
            <h2>Testimonials + Industry Feedback</h2>
            <?php
        // WP_Query arguments
        $args = array (
        'post_type'                 => 'testimonial',
        'post_count'                => 2,
        'posts_per_page'            => 2,

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
       
        </div>
        <div class="section-footer">
            <span class="graphic arrow-section-down"></span>
          </div>
    </div>