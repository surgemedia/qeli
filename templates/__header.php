<div id="header" role="banner" aria-labelledby="landmark-label-2">
  <?php get_template_part('templates/part', 'trimming-stripe-rainbow'); ?>
  <nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand graphic logo" href="<?php echo esc_url(home_url('/')); ?>"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(
            array('theme_location' => 'primary_navigation',
           'walker' => new Roots_Nav_walker(),
           'menu_class' => 'nav navbar-nav'
           ));
        endif;
      ?>
      <?php
        if (has_nav_menu('search')) :
          wp_nav_menu(
            array('theme_location' => 'search',
           'walker' => new Roots_Nav_walker(),
           'menu_class' => 'nav navbar-nav navbar-right'
           ));
        endif;
      ?>
    
  </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav></div>