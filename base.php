<?php get_template_part('templates/head'); ?>
<body <?php body_class(); ?>>

  <!--[if lt IE 8]>
    <div class="alert alert-warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->

  <?php
    do_action('get_header');
    get_template_part('templates/header');
  ?>

<?php
$post_type = get_post_type($post);
if(get_field('color_scheme')){
  $color_scheme = get_field('color_scheme');
} else {
  $color_scheme = 'blue';
}

if($post_type==='courses') {
  $color_scheme = 'green';
}
?>

  <div id="content-container" class="<?php echo $color_scheme; ?> <?php echo $post_type; ?>">
    <div class="col-xs-12">
      <main class="row" role="main">
        <?php include roots_template_path(); ?>
      </main><!-- /.main -->

      <?php // TODO the templates could do with a restructure to get the sidebar back up in here. ?>

  </div><!-- /.content -->
</div><!-- /.wrap -->
<?php
    get_template_part('templates/modal', 'video');
  ?>
<?php get_template_part('templates/footer'); ?>
<?php wp_footer(); ?>
</body>
</html>