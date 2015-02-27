<?php
									 ?>
<div class="person col-xs-12 col-sm-6 col-md-4"
	data-title="<?php the_title();?>"
	data-description="<?php echo get_field('biography');?>"
	data-lastname="<?php echo get_field('last_name'); ?>"
	data-term="<?php $terms = wp_get_post_terms($post->ID, 'people_group');
					foreach($terms as $term) {echo $term->name . ' ';  }
				?>">
	<div class="person-content">
		<div class="row">
			<div class="col-xs-6">
				<div class="row">
					<img src="<?php echo getFeaturedUrl(); ?>" class="img-responsive img-circle"
						 data-src="<?php echo getFeaturedUrl(); ?>" alt="Photo of <?php the_title(); ?>"
						 data-holder-rendered="true"/>
					<div class="graphic panel-info-callout"></div>

				</div>
			</div>
			<div class="col-xs-6">
				<div class="person-info">
					<h3><?php the_title(); ?></h3>
					<?php /* ?>
					<?php if (the_field('author_role')): ?>
						<?php the_field('author_role'); ?>
						<br>
					<?php endif; ?>
					*/ ?>
					<span>VIEW BIO</span><br>
					<span><?php edit_post_link(); ?></span>
				</div>
			</div>
		</div>
	</div>
</div>