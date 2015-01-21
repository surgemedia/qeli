<div class="person ceo">
	<div class="colored-background">
		<?php get_template_part('templates/page', 'colored-header'); ?>
		<div class="container">
			<div class="col-xs-12 col-sm-3">
				<img class="img-responsive img-circle hidden-xs" src="<?php echo get_field('people_repeater')[$GLOBALS['people_count']]['image']['url']; ?>" alt="">
			</div>
			<div class="col-xs-12 col-sm-9">
				<div class="meta-title h3"><?php echo get_field('people_repeater')[$GLOBALS['people_count']]['qualifications'] ?></div>
				<h2><?php echo get_field('people_repeater')[$GLOBALS['people_count']]['name'] ?></h2>
				<div class="meta-title"><?php echo get_field('people_repeater')[$GLOBALS['people_count']]['position'] ?></div>
				<p>
				<?php echo get_field('people_repeater')[$GLOBALS['people_count']]['biography'] ?>
				</p>
			</div>
		</div>
	</div>
	<div class="container">
	<?php echo get_field('people_repeater')[$GLOBALS['people_count']]['special_responsibilities'] ?>
		<div class="meta-email">
			<h3>Email</h3>
			<a href="mailto:<?php echo get_field('people_repeater')[$GLOBALS['people_count']]['email'] ?>"><?php echo get_field('people_repeater')[$GLOBALS['people_count']]['email'] ?></a>
		</div>
	</div>
</div>