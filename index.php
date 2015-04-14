<article id="content" class="col-xs-12">
 <div class="row">
    <div class="page-header colored-background image-background overlay" style="background-image:url('<?php
      $id = get_post_thumbnail_id();
      echo wp_get_attachment_image_src($id, 'full')[0];
    ?>')">
      <?php get_template_part('templates/page', 'colored-header'); ?>
        <div class="container header-text">
        <?php the_content(); ?>
        </div>
      </div>
    </div>
 <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-9">
        <?php if (!have_posts()) : ?>

          <div class="alert alert-warning">
            <?php _e('Sorry, no results were found.', 'roots'); ?>
          </div>
          <?php get_search_form(); ?>
        <?php endif; ?>

        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/content', 'post-type-post-blog'); ?>
        <?php endwhile; ?>

        <?php if ($wp_query->max_num_pages > 1) : ?>
          <nav class="post-nav">
            <ul class="pager">
              <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
              <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
            </ul>
          </nav>
        <?php endif; ?>
      </div>
      <div class="col-xs-12 col-sm-3">
          <?php if (roots_display_sidebar()) : ?>
              <aside class="sidebar" role="complementary">
                <?php include roots_sidebar_path(); ?>
              </aside><!-- /.sidebar -->
          <?php endif; ?>
      </div>
    </div>
  </div>
</article>