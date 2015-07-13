<div id="header" role="banner" aria-labelledby="landmark-label-2">
	<?php get_template_part('templates/part', 'trimming-stripe-rainbow'); ?>
	<nav >
	<div class="container">
		<ul id="login-nav" class="nav navbar navbar-nav pull-right">
			<li>
				<a href="#login"><i class="qeli-icon-enroll"></i>
				<span>>></span>
				<span>enroll</span>
				</a>
			</li>
			<li>
				<a href="http://my.qeli.qld.edu.au">
				<i class="qeli-icon-login"></i>
				<span>>></span>
				<span>login</span>
				</a>
			</li>
		</ul>
	</div>
	</nav>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand graphic logo" href="<?php echo site_url(); ?>"></a>
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
							Subscribe
							<span class="graphic nav-menu-callout"></span>
						</a>
						<div id="subscribe-collapse" class="panel subscribe-form collapse">
							<div class="panel-heading">
								<h3>Subscribe</h3><span class="graphic icon-close" data-target="#subscribe-collapse" data-toggle="collapse" aria-expanded="false" aria-controls="contact-collapse"></span>
							</div>
							<div class="panel-body">
								<form action="http://qeli.createsend.com/t/d/s/tutydt/" method="post">
								  <label class="sr-only"><?php _e('Subscribe', 'roots'); ?></label>
								  <div class="input-group">
								   <input id="fieldName" name="cm-tutydt-tutydt" type="name" required placeholder="Name" />
								   <input id="fieldCompany" name="cm-tutydt-tutydt" type="company" required placeholder="Company" />
								   <input id="fieldPhone" name="cm-tutydt-tutydt" type="phone" required placeholder="Phone" />
								   <input id="fieldEmail" name="cm-tutydt-tutydt" type="email" required placeholder="Email" />
								    <span class="input-group-btn">
								      <button type="submit" class="search-submit btn btn-subscribe"><?php _e('Subscribe', 'roots'); ?></button>
								    </span>
								  </div>
								</form>
							</div>	
						</div>
					</li>
					<li  class="main-menu-item">
						<a href="cart" class="menu-link">
							<span class="graphic nav-icon nav-cart"></span>
							Cart
							<span class="graphic nav-menu-callout"></span>
						</a>
					</li>
				</ul>
			</div>
		</div>
  	</nav>
</div>