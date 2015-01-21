<?php
/**
 * Roots includes
 *
 * The $roots_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/roots/pull/1042
 */
$roots_includes = array(
  'lib/utils.php',           // Utility functions
  'lib/init.php',            // Initial theme setup and constants
  'lib/wrapper.php',         // Theme wrapper class
  'lib/sidebar.php',         // Sidebar class
  'lib/config.php',          // Configuration
  'lib/activation.php',      // Theme activation
  'lib/titles.php',          // Page titles
  'lib/nav.php',             // Custom nav modifications
  
  'lib/gallery.php',         // Custom [gallery] modifications
  'lib/scripts.php',         // Scripts and stylesheets
  'lib/extras.php',          // Custom functions
  'lib/function-debug.php',   //Displays arrays in a pre for easy reading
  'lib/function-get-featured-image-url.php',   //Displays arrays in a pre for easy reading
  'lib/function-clean-youtube-link.php',   //Displays arrays in a pre for easy reading
  'lib/function-truncate-content.php',   //Displays arrays in a pre for easy reading
  'lib/function-get-tax-names.php',   //Displays arrays in a pre for easy reading


  //Post Types
  'lib/action-post-type-courses.php',       // Custom Post Type : courses
  'lib/action-post-type-case-studies.php',  // Custom Post Type : case-studies
  'lib/action-post-type-videos.php',        // Custom Post Type : Videos
  'lib/action-post-type-news.php',        // Custom Post Type : News
  'lib/action-post-type-testimonials.php',        // Custom Post Type : News
                                              
                        





);

foreach ($roots_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'roots'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
