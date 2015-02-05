<div class="testimonial-item">
  <div class="hidden-xs col-sm-3">
    <img src="<?php  echo getFeaturedUrl(); ?>" alt="<?php the_title(); ?>" class="img-circle img-responsive" data-src="<?php  echo getFeaturedUrl(); ?>" data-holder-rendered="true">
  </div>
  <div class="col-xs-12 col-sm-7">
    <h3 class="author-name"><?php the_title(); ?></h3>
    <span class="author-role"><?php the_field('author_role') ?></span>, <span class="author-institution"><?php the_field('author_institution') ?></span>
    
  </div>
  <div class="col-xs-12">
    <div class="item-text">
      <p><?php the_content(); ?>
      </p>
    </div>
  </div>
</div>