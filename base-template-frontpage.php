<?php get_template_part('templates/head'); ?>
<body <?php body_class('home-page'); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>

<div class="modal fade in" id="videoModal" ><div class="modal-backdrop fade in"></div>
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe src="" width="500" height="281" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
      </div>
    </div>
  </div>
</div>

  <div id="content-container" class="">
  <article id="content" class="col-xs-12">
  <div class="scroller-wrapper" >
  <div class="scroller">
        <?php include roots_template_path(); ?>
    </div><!-- /.content -->
  </div><!-- /.wrap -->
  </article>
  </div>

</body>
</html>
