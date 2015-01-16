<div class="section case-studies pink" style="width: 1680px; height: 806px;">
  <div class="container center-all">
    <div class="row">
      <div class="col-xs-12">
        <h2>Case Studies</h2>
      </div>
      <?php
      // WP_Query arguments
      $args = array (
      'post_type'              => 'case_studies',
      // @link action-post-type-case-studies.php
      'post_count'            => 2,
      'posts_per_page'            => 2,
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
      } else {
      //echo 'No Posts Sonny';
      }
      // Restore original Post Data
      wp_reset_postdata()
      ?>
      
      <div class="col-xs-12">
        <a href="http://breadcrumbdigital.com.au/projects/qeli-trials/courses/" class="big-link"><span class="graphic arrow-link-sq"></span> View all case studies</a>
      </div>
    </div>
  </div>
  <div class="section-footer">
    <span class="graphic arrow-section-down"></span>
  </div>
</div>