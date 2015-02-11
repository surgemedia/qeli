
<div class="section videos blue">
  <div class="container center-all">
    <div class="col-xs-12 col-md-9">
      <div class="row">
        <?php
          // WP_Query arguments
          $count = 0;
          $args = array (
          'post_type'              => 'videoes',
          'post_count'            => 4,
          'posts_per_page'        => 4,
          );
          // The Query
          $query = new WP_Query( $args );
          // The Loop
          if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();  ?>
              <?php if(0 == $count) : ?>
               <?php // checks if 1st post, then counts ?>
                <?php  get_template_part('templates/content-post-type-post-block', 'big-video');  $count++;?>
      </div>
    </div>
    <div class="col-xs-12 col-md-3">
      <?php // end of big video call, count is more then 1 ?>
      <?php  else : get_template_part('templates/content-post-type-post-block', 'video'); endif; ?>
      <?php  endwhile; ?>
      <?php  else :
      //Sorry No Post Yet
      endif;
      // Restore original Post Data
      wp_reset_postdata()
      ?>
    </div>
  </div>
  <div class="section-footer">
    <span class="graphic arrow-section-down"></span>
  </div>
</div>
