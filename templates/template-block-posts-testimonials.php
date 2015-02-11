<div class="section case-studies">
  <div class="container center-all">
    <div class="row">
    
        <div class="blue col-xs-12 ">
          
          <h2>Testimonials</h2>

          <div class="row">
            <?php
              // WP_Query arguments
              $args = array (
              'post_type'                 => 'testimonial',
              'post_count'                => 4,
              'posts_per_page'            => 4,

              );
              // The Query
              $query = new WP_Query( $args );
              // The Loop
              if ( $query->have_posts() ) {
                  $i = 0;
                  while ( $query->have_posts() ) {
                      ++$i;

                      $query->the_post();
                      get_template_part('templates/content-post-type-post-block', 'testimonial');   

                      if ($i%2 == 0) {
                        echo '<div class="clearfix"></div>';
                      }  
                  }
              } 
              else {
                  get_template_part('templates/content', 'no-posts'); 
              }
                // Restore original Post Data
              wp_reset_postdata();
            ?>
          </div>
            <!--
            <a href="http://breadcrumbdigital.com.au/projects/qeli-trials/courses/" class="big-link"><span class="graphic arrow-link-sq"></span> View all case studies</a>
            -->
        </div>

    </div>
  </div>
  <div class="section-footer">
    <span class="graphic arrow-section-down"></span>
  </div>
</div>