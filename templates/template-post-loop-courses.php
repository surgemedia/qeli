<?php 
/*========================================
=    Category Filter (Audience)          =
========================================*/
$args = array(
  'type'                     => 'course',
  'child_of'                 => 0,
  'parent'                   => '',
  'orderby'                  => 'name',
  'order'                    => 'ASC',
  'hide_empty'               => 1,
  'hierarchical'             => 1,
  'exclude'                  => '',
  'include'                  => '',
  'number'                   => '',
  'taxonomy'                 => 'courses_categories',
  'pad_counts'               => false 

);
//Create Clean Filter Array
$audiences_fill = array(); 
$categories = get_categories( $args ); 
for ($i=0; $i < count($categories); $i++) { 
   if(strlen($categories[$i]->cat_name) > 0){
  array_push($audiences_fill, $categories[$i]->cat_name."#".$categories[$i]->slug);
}
}
$audiences_fill = array_filter($audiences_fill);

?> 
<?php 
/*========================================
        =   Tag Filter      =
========================================*/
$args = array(
  'type'                     => 'course',
  'child_of'                 => 0,
  'parent'                   => '',
  'orderby'                  => 'name',
  'order'                    => 'ASC',
  'hide_empty'               => 1,
  'hierarchical'             => 1,
  'exclude'                  => '',
  'include'                  => '',
  'number'                   => '',
  'taxonomy'                 => 'courses_tags',
  'pad_counts'               => false 

);
//Create Clean Filter Array
$tags_fill = array(); 
$categories = get_categories( $args ); 
for ($i=0; $i < count($categories); $i++) { 
  if(strlen($categories[$i]->cat_name) > 0){
  array_push($tags_fill, $categories[$i]->cat_name."#".$categories[$i]->slug);
  }
}
$tags_fill = array_filter($tags_fill);

?> 


<div class="leadin container">
  <h2>What skills are you looking to develop?</h2>
</div>
<div id="filters">
  <div class="feature-filters">
    <div class="colored-background">
      <div class="container">
        <div id="filter-primary">
          <div class="selectors open">
            <ul class="col-xs-12 filter-group tags" data-filter-group="tags">
            
            

           <?php for ($i=0; $i < count($tags_fill); $i++) { 
              $parts = explode('#',$tags_fill[$i]);

              ?>
              <li>
                <a href="#" role="presentation" data-filter=".<?php echo $parts[1]; ?>" data-filter-group="tags" data-value-str="<?php echo $parts[0]; ?>">
                  <span class="filter-arrow">&gt;</span><?php echo $parts[0]; ?>
                </a>
              </li>
              <?php  } ?>



            </ul>
            
          </div>
        </div>
      </div>
    </div>
   <div class="leadin container">
  <h2>What is your current or aspiring postion?</h2>
  </div>
    <div class="colored-background">
      <div class="container">
        <div id="filter-extended">

          <div class="selectors open">
            <ul class="col-xs-12 filter-group audience" data-filter-group="audience">
             
             <?php for ($i=0; $i < count($audiences_fill); $i++) { 
              $parts = explode('#',$audiences_fill[$i]);

              ?>
              <li>
                <a href="#" role="presentation" data-filter=".<?php echo $parts[1]; ?>" data-filter-group="audience" data-value-str="<?php echo $parts[0]; ?>">
                  <span class="filter-arrow">&gt;</span><?php echo $parts[0]; ?>
                </a>
              </li>
              <?php  } ?>
              
            </ul>
            
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="colored-background dark">
    <div id="filter-view" class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6">
          <div class="row">
            <span class="filter-message hidden">
            <span class="circle-arrow"><span class="graphic arrow-right-gray"></span></span>
            Showing results for:
            <span class="filter-value">
            <span class="filter-label"></span>
            <a class="filter-clear" href="#" data-filter="" data-filter-group="all">
              <span class="graphic icon-close-circle"></span>
            </a>
            </span>
            <div class="visible-xs clearfix"></div>
            <span class="circle-or">OR</span>
            </span>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="row">
            <div class="filter-view-right">
              Show me<span class="graphic arrow-right-black"></span>
              <a href="#" class="btn btn-filter" data-filter="" data-filter-group="all">All</a>
              <a href="#" class="btn btn-filter filter-favourite" data-filter=".favourite" data-filter-group="favourite" data-value-str="favourites">Favourite</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="courseOverview" class="isotope container" >
  <div class="col-xs-12">
    
    <?php
    //Gets a templated post from the ID
    $args = array (
    'post_type' => 'courses',
    'posts_per_page'         => '-1',
    'orderby'                  => 'name',
    'order'                    => 'ASC',

    );
    // The Query
    $query = new WP_Query( $args );
    // The Loop
    if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
    $query->the_post();
    get_template_part('templates/content-post-type', 'courses');
    }
    }
    else {
    get_template_part('templates/content', 'no-posts');
    }
    // Restore original Post Data
    wp_reset_postdata();
    ?>
  </div>
</div>