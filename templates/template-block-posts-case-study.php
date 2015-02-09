<div class="section case-studies">
  <div class="container center-all">
    <div class="row">
    
    <div class="blue col-xs-12 col-md-6">
      
      <h2>Testimonials</h2>

      <div class="row">
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
    <div class="pink col-xs-12 col-md-6">
       
        <h2>Case Studies</h2>
        <?php
          // WP_Query arguments
          $args = array (
                    'post_type'              => 'case_studies',
                    // @link action-post-type-case-studies.php
                    'post_count'            => 1,
                    'posts_per_page'            => 1,
                  );
          
          // Counter using in div.numbering
          // @link templates-content-post-type-post-block-case-study
          $GLOBALS['numbering-counter'] = 1;
          // The Query
          $query = new WP_Query( $args );
          // The Loop
          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
              get_template_part('templates/content-post-type-post-block', 'case-study');
              $GLOBALS['numbering-counter']++;
            }
          }
          else {
          //echo 'No Posts Sonny';
          }
          // Restore original Post Data
          wp_reset_postdata()
        ?>
        <a href="http://breadcrumbdigital.com.au/projects/qeli-trials/courses/" class="big-link"><span class="graphic arrow-link-sq"></span> View all case studies</a>
      </div>
    </div>
  </div>
  <div class="section-footer">
    <span class="graphic arrow-section-down"></span>
  </div>
</div>