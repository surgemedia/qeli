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
				<?php 
					wp_nav_menu(array('theme_location' => 'primary',
									'container' => false,
									'menu'=> 'primary',
									'menu_id' => 'home-nav',
									'menu_class' => 'nav navbar navbar-nav', 
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'walker' => new QELi_Nav_Menu()
								)
							);
					?>
				<ul class="nav navbar navbar-nav navbar-right" role="search">
					<li class="main-menu-item nav-search">
						<a href="#search-collapse" class="menu-link" data-toggle="collapse" aria-expanded="false" aria-controls="search-collapse">
							<span class="graphic nav-icon nav-search"></span>
							Search
							<span class="graphic nav-menu-callout"></span>
						</a>
						<div id="search-collapse" class="panel search-form collapse">
							<div class="panel-body">
								<?php get_template_part('templates/searchform'); ?>
							</div>
						</div>
					</li>
					<li class="main-menu-item nav-subscribe ">
						<a href="#subscribe-collapse" class="menu-link btn-subscribe" data-toggle="collapse" aria-expanded="false" aria-controls="subscribe-collapse">
							<span class="graphic nav-icon nav-e-news"></span>
							subscribe
							<span class="graphic nav-menu-callout"></span>
						</a>
						<div id="subscribe-collapse" class="panel subscribe-form collapse">
							<div class="panel-heading">
								<h3>Subscribe</h3> <span class="graphic icon-close" data-target="#subscribe-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="contact-collapse"></span>
							</div>
							<div class="panel-body">
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur mauris mauris, cursus ut semper a, dignissim sed nisl. Maecenas feugiat, massa eu elementum eleifend, turpis orci condimentum purus, vel ultricies lectus ligula tempor nunc. Nunc volutpat et metus non sodales. Fusce venenatis in nisi in volutpat. Integer in ex efficitur, auctor metus in, bibendum odio. Sed non maximus sem, ut vulputate eros. Curabitur facilisis neque ut tortor finibus molestie. Proin vel congue ante. Nam commodo est mauris, eget eleifend justo maximus a. Etiam a nulla eget justo sodales sagittis. Sed ut mauris vel augue aliquet hendrerit.
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
  	</nav>
</div>