<?php 
// Register Custom Post Type
function courses() {

	$labels = array(
		'name'                => _x( 'Courses', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Course', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Courses', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Course:', 'text_domain' ),
		'all_items'           => __( 'All Courses', 'text_domain' ),
		'view_item'           => __( 'View Course', 'text_domain' ),
		'add_new_item'        => __( 'Add New Course', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Course', 'text_domain' ),
		'update_item'         => __( 'Update Course', 'text_domain' ),
		'search_items'        => __( 'Search Courses', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'courses', 'text_domain' ),
		'description'         => __( 'Qeli Course Infomations ', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'author', 'thumbnail', 'comments', 'revisions', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-welcome-widgets-menus',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'courses', $args );

}

// Hook into the 'init' action
add_action( 'init', 'courses', 0 );