<div class="person col-xs-12 col-sm-6 col-md-4" 
	data-group="group-a" 
	data-title="<?php the_title();?>" 
	data-description="<?php the_field('short_description');?>"
	data-term="<?php $terms = wp_get_post_terms($post->ID, 'people_group'); echo $terms[0]->name; ?>"
>

	<div class="row">
		<div class="col-xs-6">
			<div class="row">
				<img src="<?php echo getFeaturedUrl(); ?>" class="img-responsive img-circle" 
					 data-src="<?php echo getFeaturedUrl(); ?>" alt="150x150" 
					 data-holder-rendered="true"/>
				<div class="graphic panel-info-callout"></div>
			</div>
		</div>
		<div class="col-xs-6">
			<h3><?php the_title(); ?></h3>
			<?php if (the_field('author_role')): ?>
				<?php the_field('author_role'); ?>
				<br>
			<?php endif; ?>
			VIEW BIO
		</div>
	</div>
</div>