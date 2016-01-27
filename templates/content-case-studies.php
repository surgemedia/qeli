<?php while (have_posts()) : the_post(); ?>
 <article id="content" class="col-xs-12">
  <div class="row">
    <?php 
  $id = get_post_thumbnail_id();
  if(wp_get_attachment_image_src($id, 'full')[0]){
    $class = 'page-header colored-background image-background overlay';
    } else {
    $class = 'page-header';
    }
      ?>
    <div class="<?php echo $class; ?>" style="background-image:url('<?php
      echo wp_get_attachment_image_src($id, 'full')[0];
    ?>')">
      <?php get_template_part('templates/page', 'colored-header'); ?>
      <?php get_template_part('templates/content-header', 'text'); ?>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <?php get_template_part('templates/content', 'lead'); ?>
        <?php the_field('body_text'); ?>
      <div class="col-xs-12">
       <!-- <h3>Participants</h3> -->
        <?php the_field('participants') ?>
      </div>
      <div class="col-xs-12">
       <!-- <h3>Outcome</h3> -->
        <?php the_field('outcome') ?>
      </div>

      <?php if(sizeof(get_field('gallery')[0]) > 0 ) { ?>
      <div class="col-xs-12">
       <h3>Gallery</h3>
              <div id="bs-gallery" class="slider">
                    <!-- Top part of the slider -->
                    <div class="row">
                        <div class="col-sm-12" >
                            <div class="carousel slide galleryCarousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                <?php
                                $images = get_field('gallery'); 
                                 for ($i=0; $i < count($images); $i++) {
                                    // debug($images[$i]['sizes']);
                                    if($i == 0) { 
                                        $active = "active";
                                    } else {
                                         $active = "";
                                    }
                                   if(strlen($images[$i]['sizes']['thumbnail']) > 0) {
                                    ?>  
                                  
                                    <div class="<?php echo $active; ?> item" data-slide-number="<?php echo $i; ?>">
                                        <img src="<?php echo $images[$i]['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>">
                                    </div>
                                    <?php  } } ?>
                            </div>
                        </div>
                    </div>
                </div>
           
            <div class="slider-thumbs">
                <!-- Bottom switcher of slider -->
                <ul class="hide-bullets">
                  <?php for ($i=0; $i < count($images); $i++) { if(strlen($images[$i]['sizes']['thumbnail']) > 0) { ?>
                  
                   <li class="col-md-2 col-sm-6 col-xs-6">
                        <a class="thumbnail" id="carousel-selector-<?php echo $i; ?>">
                            <img src="<?php echo $images[$i]['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>">
                        </a>
                    </li>
                 <?php } } ?>
                  
                </ul>
            </div>
      </div>
      </div>
      <?php } ?>
    </div>
     <div class="col-xs-12">
     <hr>
  <?php // debug(get_post_type()); ?>
  </div>
  </div>
</article>
<?php endwhile; ?>