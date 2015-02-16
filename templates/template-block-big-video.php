
<div class="section videos blue alt">
  <span class="hero-overlay left"></span>
  <div class="container center-all">
    <div class="row">
      <?php
          // TODO JW - this needs to be seperated into a query that returns the main video (brand video) and then these others.
          // WP_Query arguments
      $count = 0;
      $args = array (
        'post_type'              => 'videoes',
        'post_count'            => 1,
        'posts_per_page'        => 1,
        );
          // The Query
      $query = new WP_Query( $args );
          // The Loop
      if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();  ?>
      <?php if(0 == $count) : ?>
      <?php // checks if 1st post, then counts ?>
      <div class="col-xs-12">


<h2>Who is QELi</h2><br>
<div class="video-item">
  <a href="#" class="video-popup-thumbnail" data-url="//www.youtube.com/embed/<?php echo cleanYoutubeLink(get_field('talks')[0]['embed_code']); ?>" data-modal="#videoModal" data-width="800" data-height="540" role="button">
    <img class="img-responsive" src="http://54.79.72.151/~qeliedu/wp-content/uploads/2015/02/BrandVideo.jpg" data-holder-rendered="true">
    <div class="overlay">
      <!-- <span class="video-modal graphic btn-play-lg"></span> -->
    </div>
  </a>
</div>
<a href="<?php echo site_url(); ?>/qeli-talks" class="big-link"><span class="graphic arrow-link-sq"></span> View all videos</a>



      </div>
  <?php endif; ?>
<?php  endwhile; ?>
<?php  else :
      //Sorry No Post Yet
endif;
      // Restore original Post Data
wp_reset_postdata()
?>
</div>
</div>
<span class="hero-overlay right"></span>
<div class="section-footer">
  <span class="graphic arrow-section-down"></span>
</div>
</div>
