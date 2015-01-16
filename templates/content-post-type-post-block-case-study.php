<div class="col-xs-12 col-md-6">

	<div class="numbering"><?php echo $GLOBALS['numbering-counter']; ?></div>
	<h3>Course</h3>
	<p><?php the_field('program') ?></p>
	<h3>Participants</h3>
	<?php the_field('participants') ?>
	<h3>Outcome</h3>
	<?php the_field('outcome') ?>
	<a href="<?php the_permalink(); ?>" class="btn-link"><span class="graphic arrow-link"></span> Read Overview</a>
	<div class="clearfix">
		<?php
		$gallery = get_field('gallery');
		for ($i=0; $i < sizeof($gallery); $i++) {
			$src = $gallery[$i]['sizes']['thumbnail']; //150x150 thumbnail
			$data_src = $gallery[$i]['url']; //fullsize ?>
		<div class="col-xs-4">
			<div class="row">
				<img data-src="<?php echo $gallery[$i]['url']; ?>" alt="400x225" class="img-responsive" src="<?php echo $gallery[$i]['sizes']['thumbnail']; ?>" data-holder-rendered="true">
			</div>
		</div>
		<?php	} // $gallery for loop ?>
	</div>
	<?php edit_post_link(); ?>
</div>