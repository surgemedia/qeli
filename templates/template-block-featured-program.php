<div class="section featured-program green">
  <div class="container center-all">
    <h2>Featured Program</h2>
    <div class="row">
        <div class="col-xs-12">
        <div class="row">
          <div class="col-xs-12 col-sm-6">
          <?php 
          $GLOBALS['program_id'] = get_field('featured_program');
          $GLOBALS['testimonial_id'] = get_field('featured_testimonial');

          ?>
          <?php
          //Gets a templated post from the ID
          $args = array (
            'post_type' => 'courses',
            'p' => $GLOBALS['program_id'],

          );
          // The Query
          $query = new WP_Query( $args );
          // The Loop
          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
              get_template_part('templates/content', 'featured-program-home-content');
            }
          }
          // Restore original Post Data
          wp_reset_postdata();
        ?>
        <?php
          //Gets a templated post from the ID
          $args = array (
            'post_type' => 'testimonial',
            'p' => $GLOBALS['testimonial_id'],

          );
          // The Query
          $query = new WP_Query( $args );
          // The Loop
          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
              get_template_part('templates/content', 'featured-testimonial-home-content');
            }
          }
          // Restore original Post Data
          wp_reset_postdata();
        ?>


          </div>
          <?php
          //Gets a templated post from the ID
          $args = array (
            'post_type' => 'courses',
            'p' => $GLOBALS['program_id'],

          );
          // The Query
          $query = new WP_Query( $args );
          // The Loop
          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
              $query->the_post();
              get_template_part('templates/content', 'featured-program-home-facilator');
            }
          }
          // Restore original Post Data
          wp_reset_postdata();
        ?>
          
          <div class="col-xs-12">
            <a href="<?php echo site_url() ?>/program-overview/" class="big-link text-green"><span class="graphic arrow-link-sq"></span> visit program profile</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="section-footer">
    <span class="graphic arrow-section-down"></span>
  </div>
</div>
