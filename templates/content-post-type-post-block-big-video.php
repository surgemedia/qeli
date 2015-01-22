<div class="video-item">
	<img alt="800x450" class="img-responsive" src="<?php echo getFeaturedUrl(); ?>" data-holder-rendered="true">
	<div class="video-modal graphic btn-play-sm" data-modal="#videoModal" data-src="//www.youtube.com/embed/<?php echo cleanYoutubeLink(get_field('talks')[0]['embed_code']); ?>">
	</div>
</div>
<h3><?php the_title(); ?></h3>
<?php echo get_field('talks')[0]['description']; ?>
<a href="<?php echo site_url(); ?>/qeli-talks" class="big-link"><span class="graphic arrow-link-sq"></span> View all videos</a>
