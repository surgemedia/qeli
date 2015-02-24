<div class="section gray our-partners">
	<div class="container center-all">
		<h2>Our Partners</h2>

		<?php 
			$post = get_page_by_path('our-partners');
			setup_postdata($post);
		?>
		<div class="section-text">
			<?php the_content(); ?>
		</div>
		<?php if(have_rows('partners')): ?>
			<ul class="bxslider-partners">
			<?php while(have_rows('partners')): the_row();?>
				<li>
					<a href="<?php the_sub_field('homepage'); ?>" target="_blank">
						<img src="<?php $id = get_sub_field('image');
									echo wp_get_attachment_image_src($id, 'qeli-partner-logo')[0]; ?>" 
							class="img-responsive"/>
					</a>
				</li>
			<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
	<div class="section-footer">
		<span class="graphic arrow-section-down"></span>
	</div>
</div>