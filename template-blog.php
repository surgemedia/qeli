<?php
/*
Template Name: Blog Page
*/
?>
<article id="content" class="col-xs-12">
 <div class="row">
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
        <div class="container header-text">
        <?php the_content(); ?>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <?php get_template_part('archive', 'blog'); ?>
</article>
<?php endwhile; ?>
