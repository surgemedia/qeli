<div class="section videos blue">
  <div class="container">
    <div class="col-xs-12 col-md-9">
      <?php
      // TODO JW - this needs to be seperated into a query that returns the main video (brand video) and then these others.
      // WP_Query arguments
      $count = 0;
      $featured_video;
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
      while ( $query->have_posts() ) : $query->the_post();  ?>
      <?php  $featured = get_field('featured',get_the_id()); ?>
      
      <?php  $featured_video = get_the_id(); ?>
      <?php  get_template_part('templates/content-post-type-post-block', 'big-video');  $count = 1; $featured = 0;?>
      
      <?php endwhile; //while ?>
      <?php } //if have posts ?>
      <?php
      
      $args = array (
      'post_type'              => 'videoes',
      'post_count'            => 4,
      'posts_per_page'        => -1,
      );
      // The Query
      $query = new WP_Query( $args );
      // The Loop
      if ( $query->have_posts() ) {
      while ( $query->have_posts() ) : $query->the_post();  ?>
      <?php  $featured = get_field('featured',get_the_id()); ?>
    </div>
    <div class="col-xs-12 col-md-3 row">
      <div class="col-xs-12 col-sm-4 col-md-12">
        <?php if(get_the_id() != $featured_video) { ?>
        <?php get_template_part('templates/content-post-type-post-block', 'video');?>
        <?php } ?>
      </div>
      <?php endwhile; //while ?>
      <?php } //if have posts ?>
      <?php wp_reset_postdata(); ?>
    </div>
  </div>
  <div class="section-footer">
    <span class="graphic arrow-section-down"></span>
  </div>
</div>