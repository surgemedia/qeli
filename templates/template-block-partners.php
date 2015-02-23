<div class="section blue our-partners">
	<div class="center-all">
		<div class="container">
			<?php 
				$post = get_page_by_path('our-partners');
				setup_postdata($post);
			?>
			<?php if(have_rows('partners')): $i = 0; ?>
				<?php while(have_rows('partners')): the_row();?>
					<?php $i++; ?>
					<a href="<?php the_sub_field('homepage'); ?>" class="col-xs-12 col-sm-4" target="_blank">
						<img src="<?php $id = get_sub_field('image');
								// TODO this is not returning the correct sized image
									echo wp_get_attachment_image_src($id, 'qeli-partner-logo')[0];
						?>" class="img-responsive"/>
						
					</a>
					<?php if($i%3 == 0): ?>
						<div class="clearfix"></div>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
	<div class="section-footer">
		<span class="graphic arrow-section-down"></span>
	</div>
</div>