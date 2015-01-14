<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>
<?php if( false == is_front_page()) : ?>

  <div id="content-container" class="">
    <div class="content row">
      <main class="main" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->
      <?php if (roots_display_sidebar()) : ?>
        <aside class="sidebar" role="complementary">
          <?php include roots_sidebar_path(); ?>
        </aside><!-- /.sidebar -->
          <?php get_template_part('templates/footer'); ?>

  <?php wp_footer(); ?>
  </div><!-- /.content -->
  </div><!-- /.wrap -->
      <?php endif; ?>
    
<?php else : ?>
  <div id="content-container" class="">
  <article id="content" class="col-xs-12">
  <div class="scroller-wrapper" >
  <div class="scroller">
 
        <?php include roots_template_path(); ?>
       
     
     
    </div><!-- /.content -->
  </div><!-- /.wrap -->
  </article>
  </div>
  
<?php endif;?>


</body>
</html>
