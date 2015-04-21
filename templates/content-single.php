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
        <?php the_content(); ?>
      </div>
    </div>
     <div class="col-xs-12">
     <hr>
  <?php // debug(get_post_type()); ?>
  <?php if('post' == get_post_type()){ ?>
      <?php comments_template('/templates/comments.php'); ?>
  <?php } ?>
  </div>
  </div>
</article>
<?php endwhile; ?>