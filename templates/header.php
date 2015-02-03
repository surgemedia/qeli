<?php get_template_part('templates/part', 'trimming-stripe-rainbow'); ?>
<div id="header" role="banner" aria-labelledby="landmark-label-2">
	<nav class="navbar navbar-default" role="navigation">
	
	<div class="container">

	 <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand graphic logo" href="#"></a>
    </div>
    
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<?php //get_template_part('templates/navbar'); 
				wp_nav_menu(array('theme_location' => 'primary',
								'container' => false,
								'menu'=> 'primary',
								'menu_id' => 'home-nav',
								'menu_class' => 'nav navbar navbar-nav', 
								'items_wrap' => '<div id="%1$s" class="%2$s">%3$s</div>',
								'walker' => new QELi_Nav_Menu()
							)
						);
	  ?>
	  </div>
	  </div>
  </nav>
</div>