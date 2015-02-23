<div class="section blue our-partners">
	<div class="center-all">
		<div class="container">
			<?php 
				$post = get_page_by_path('our-partners');
				setup_postdata($post);
			?>
			<?php if(have_rows('partners')): ?>
				<div class="graphic arrow-left-black"></div>
				<div class="graphic arrow-right-black"></div>

				<ul class="bxslider-partners">
				<?php while(have_rows('partners')): the_row();?>
					<li>
						<a href="<?php the_sub_field('homepage'); ?>" target="_blank">
							<img src="<?php $id = get_sub_field('image');
										echo wp_get_attachment_image_src($id, 'qeli-partner-logo')[0];
							?>" class="img-responsive"/>
							
						</a>
					</li>
				<?php endwhile; ?>
				</ul>
			<?php endif; ?>
		</div>
	</div>
	<div class="section-footer">
		<span class="graphic arrow-section-down"></span>
	</div>
</div>