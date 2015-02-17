
<div class="section videos green alt">
  <div class="video-top-panel">
    <div class="container">
      <div class="col-xs-12">
        <h2>QEL<span class="text-lowercase">i</span>: Be the difference, that makes a difference, to the lives of children</h2>
      </div>
  </div>
  </div>

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


<div class="video-item">
  <div class="embed-responsive embed-responsive-16by9">
    <div id="player" video-id="<?php echo cleanYoutubeLink(get_field('talks')[0]['embed_code']); ?>"></div>
  <!-- <iframe id="main-video" width="1280" height="720" src="//www.youtube.com/v/<?php echo cleanYoutubeLink(get_field('talks')[0]['embed_code']); ?>?enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allowfullscreen></iframe> -->
</div>
  <a href="#" class="overlay video-in-situ" style="background-image:url('http://54.79.72.151/~qeliedu/wp-content/uploads/2015/02/BrandVideo.jpg')">
      <span class="video-modal graphic btn-play-xl"></span>
  </a>
</div>
  <?php endif; ?>
<?php  endwhile; ?>
<?php  else :
      //Sorry No Post Yet
endif;
      // Restore original Post Data
wp_reset_postdata()
?>
<div class="video-bottom-panel">
  <div class="container">
    <div class="col-xs-12">
      <h3 class="video-title">Video title</h3>
      <p class="video-date">Video Date</p>
      <a href="<?php echo site_url(); ?>/program-catalogue" class="big-link"><span class="graphic arrow-link-sq"></span> See our program catalogue</a>
    </div>
  </div>
</div
</div>
