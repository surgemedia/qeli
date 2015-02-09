<div class="section news green">
  <div class="container center-all">
    <h2>QELi SECTOR NEWS</h2>
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <?php
        // WP_Query arguments
        $args = array (
        'post_type'              => 'news_article',
        'post_count'            => 3,
        'posts_per_page'            => 3,

        );
        // The Query
        $query = new WP_Query( $args );
        // The Loop
        if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
        $query->the_post();
        
        get_template_part('templates/content-post-type-post-block', 'news');
      
        }
        } else {
        //echo 'No Posts Sonny';
        }
        // Restore original Post Data
        wp_reset_postdata()
        ?>
        
      </div>
      <div class="col-xs-12 col-md-6">
       <?php
        // WP_Query arguments
        $args = array (
        'post_type'              => 'news_article',
        'post_count'            => 3,
        'posts_per_page'            => 3,
        'offset'            => 3,

        
        );
        // The Query
        $query = new WP_Query( $args );
        // The Loop
        if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
        $query->the_post();
        
        get_template_part('templates/content-post-type-post-block', 'news');
      
        }
        } else {
        //echo 'No Posts Sonny';
        }
        // Restore original Post Data
        wp_reset_postdata()
        ?>
      </div>
    </div>
    <a href="<?php echo site_url(); ?>/news-articles/" class="big-link"><span class="graphic arrow-link-sq"></span> View all news articles</a>
  </div>
  <div class="section-footer">
    <span class="graphic arrow-section-down"></span>
  </div>
</div>