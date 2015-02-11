<div class="video-item">
	<a href="#" class="video-popup-thumbnail" data-url="//www.youtube.com/embed/<?php echo cleanYoutubeLink(get_field('talks')[0]['embed_code']); ?>" data-modal="#videoModal" data-width="800" data-height="540" role="button">
		<img alt="800x450" class="img-responsive" src="<?php echo getFeaturedUrl(); ?>" data-holder-rendered="true">
		<div class="overlay"><span class="video-modal graphic btn-play-sm"></span></div>
	</a>
</div>
<h3><?php the_title(); ?></h3>
<?php echo get_field('talks')[0]['description']; ?>
<a href="<?php echo site_url(); ?>/qeli-talks" class="big-link"><span class="graphic arrow-link-sq"></span> View all videos</a>
