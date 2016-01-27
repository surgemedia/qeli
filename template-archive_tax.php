<?php
/*
Template Name: Archived Work
*/
?>
<?php while (have_posts()) : the_post(); ?>
<?php get_template_part('taxonomy-archive_tax'); ?>
<?php endwhile; ?>