<?php
/*
	Search Results Page
*/
?>
<article id="content" class="col-xs-12">
	<div class="row">
		<div class="page-header colored-background image-background" style="background-image:url('<?php
					$id = get_post_thumbnail_id();
					echo wp_get_attachment_image_src($id, 'full')[0];
					// TODO @walt showing bg of last result.
			?>')">
			<div class="header">
				<div class="container">
					<h1 class="pagetitle">Search Result<?php /* Search Count */
					$allsearch = &new WP_Query("s=$s&showposts=-1");
					$key = wp_specialchars($s, 1);
					$count = $allsearch->post_count;
					?></h1>
				</div>
			</div>
			<div class="container header-text">
				<div class="col-lg-6">
					<?php  get_search_form(); ?>
				</div>
				<p class="col-lg-6"><?php echo $count . ' '; _e('articles found for');
				_e(' <span class="search-terms">');
				echo $key; _e('</span> '); ?>
				</p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			
			<div class="col-xs-12 <?php if (get_field('aside')) { echo 'col-sm-8'; } ?>">
				
				<?php if(have_posts()) { ?>
				<?php while (have_posts()) : the_post(); ?>
				
				<?php get_template_part('templates/content-post-type', 'media-release'); ?>
				
				<?php endwhile; ?>
				<?php } else { ?>
				<?php get_template_part('templates/content', 'no-posts'); ?>
				
				<?php wp_reset_query(); ?>
				<?php } ?>
			</div>
			
		</div>
	</div>
</article>