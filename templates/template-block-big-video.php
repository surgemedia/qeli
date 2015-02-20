<div class="section videos blue alt">
  <div class="video-top-panel">
    <div class="container">
      <div class="col-xs-12">
        <h2>QEL<span class="text-lowercase">i</span>: Be the difference, that makes a difference, to the lives of children</h2>
      </div>
    </div>
  </div>
  <?php
  $args = array (
  'post_type'              => 'videoes',
  'posts_per_page'        => 1,
  'meta_query'    => array(
  
  array( 'key' => 'featured', 'value'     => 1,))
  );
  // The Query
  $query = new WP_Query( $args );
  // The Loop
  if ( $query->have_posts() ) {
  while ( $query->have_posts() ) : $query->the_post();
  $image_url = getFeaturedUrl(get_the_id(),'full');
  ?>
  <div class="video-item max-height">
    <div class="embed-responsive embed-responsive-16by9">
      <div id="player" class="max-height" video-id="<?php echo cleanYoutubeLink(get_field('talks')[0]['embed_code']); ?>"></div>
    </div>
    <div class="overlay video-in-situ" style="background-image:url('<?php echo $image_url; ?>')">
      <span class="video-modal graphic btn-play-xl"></span>
    </div>
  </div>
  <div class="video-bottom-panel">
    <div class="container">
      <div class="col-xs-12">
        <h3 class="video-title"><?php the_title( ); ?></h3>
        <p class="video-date"><?php echo get_the_date('F j'); ?></p>
        <a href="<?php echo site_url(); ?>/program-catalogue" class="big-link"><span class="graphic arrow-link-sq"></span> See our program catalogue</a>
      </div>
    </div>
  </div
</div>
<?php endwhile; //while ?>
<?php } //if have posts ?>