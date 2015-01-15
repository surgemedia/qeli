<?php get_template_part('templates/part', 'trimming-stripe-rainbow'); ?>
<header id="header" class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(
            array('theme_location' => 'primary_navigation',
           'walker' => new Roots_Nav_Walker(),
           'menu_class' => 'nav navbar-nav',
           'link_before'     => '<span class="graphics"></span><span class="nav-label">',
            'link_after'      => '</span>',
           ));
        endif;
      ?>
    </nav>
  </div>
</header>
