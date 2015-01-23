<?php 
// Register Custom Post Type
function case_studies() {

	$labels = array(
		'name'                => _x( 'Case studies', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Case study', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Case studies', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent case studies:', 'text_domain' ),
		'all_items'           => __( 'All case studies', 'text_domain' ),
		'view_item'           => __( 'View Case studies', 'text_domain' ),
		'add_new_item'        => __( 'Add New Case study', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Case study', 'text_domain' ),
		'update_item'         => __( 'Update Case study', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'case_studies', 'text_domain' ),
		'description'         => __( 'Study of Cases', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-clipboard',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'case_studies', $args );

}

// Hook into the 'init' action
add_action( 'init', 'case_studies', 0 );


removeOtherPosts('case_studies');