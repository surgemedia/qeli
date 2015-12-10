<?php
if (0 != strlen(get_the_content())) {
    $the_link = get_the_permalink();
}
else {
    $the_link = 'javascript:void(0)';
}
?>
<?php 
	if(strlen(getFeaturedUrl()) > 0) {

 ?>
 <div class="blog-thumb col-xs-2">
<?php echo get_the_post_thumbnail( $post_id, array( 200, 200), array( 'class' => 'img-responsive pull-left' )); ?>
</div>
<?php } ?>
<h3>
<a href="<?php
echo $the_link; ?>">
<span class="graphic arrow-link"></span> <?php
the_title(); ?></a>
</h3>
<?php
if (get_field("published_in")): ?>
<p class="original-author"><?php
the_field('published_in'); ?> | <?php
the_field('date_of_publication'); ?></p>
<?php
endif; ?>
<p><?php
the_excerpt(); ?></p>
<p class="date">[Posted on:
<?php
//Used post date but also have control for date published.
echo get_the_date('F j');
?>]
</p>
<p><?php
edit_post_link(); ?></p>
<hr>