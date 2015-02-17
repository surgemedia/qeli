<div class="container">
	<?php the_field('biography'); ?>
	<div class="meta-email">
		<h3>Email</h3>
		<a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
	</div>
</div>
<?php edit_post_link(); ?>