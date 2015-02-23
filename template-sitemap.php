
<?php
/*
Template Name: Sitemap
*/
?>

<?php while (have_posts()) : the_post(); ?>
 <article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background overlay" style="background-image:url('/wp-content/uploads/2015/02/hero-image4.png')" >
			<?php get_template_part('templates/page', 'colored-header'); ?>
			<div class="container">
			<?php get_search_form(); ?>

			<?php wp_nav_menu(array('theme_location' => 'sitemap',
									'container' => false,
									'menu'=> 'sitemap',
									'menu_id' => 'sitemap',
									'menu_class' => 'nav navbar-nav',
									'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								)
							);
				?></div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php get_template_part('templates/content', 'lead'); ?>
				
				
			</div>
		</div>
	</div>
</article>
<?php endwhile; ?>
