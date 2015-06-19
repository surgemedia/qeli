<div class="section videos blue">
  <div class="container center-all">
    <div class="col-xs-12 col-md-9">
      <?php
      // TODO JW - this needs to be seperated into a query that returns the main video (brand video) and then these others.
      // WP_Query arguments
      $count = 0;
      $args = array (
      'post_type'              => 'videoes',

      );
      // The Query
      $query = new WP_Query( $args );
<<<<<<< HEAD
          // The Loop
      if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();  ?>
      <?php if(0 == $count) : ?>
      <?php // checks if 1st post, then counts ?>
      <?php  get_template_part('templates/content-post-type-post-block', 'big-video');  $count++;?>
    </div>
    <div class="col-xs-12 col-md-3 row">
      <?php // end of big video call, count is more then 1 ?>
    <?php  else :?>
    <div class="col-xs-6 col-md-12">
      <?php get_template_part('templates/content-post-type-post-block', 'video');?>
=======
      // The Loop
      if ( $query->have_posts() ) {
      while ( $query->have_posts() ) : $query->the_post();  ?>
      <?php  $featured = get_field('featured',get_the_id()); ?>
      
      <?php if($featured == 1 && $count == 0) { ?>
      <?php  get_template_part('templates/content-post-type-post-block', 'big-video');  $count++; $featured = 0;?>
      <?php } else {
         get_template_part('templates/content', 'no-posts'); 
        } ?>
       <?php endwhile; //while ?>
     <?php } //if have posts ?>


     <?php 
     $count = 0;
      $args = array (
      'post_type'              => 'videoes',
      'post_count'            => 4,
      'posts_per_page'        => 4,
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
      <?php if($featured != 1 ) { ?>
        <?php get_template_part('templates/content-post-type-post-block', 'video');?>
        <?php } ?>
      </div>
     <?php endwhile; //while ?>
     <?php } //if have posts ?>

 
      <?php wp_reset_postdata(); ?>
>>>>>>> 91050c25323935e9476152e513932ac904b67de3
    </div>
  </div>
  <div class="section-footer">
    <span class="graphic arrow-section-down"></span>
  </div>
</div>
