<?php 
// Register Custom Taxonomy
function video_tags() {

	$labels = array(
		'name'                       => _x( 'Video Tags', 'Taxonomy General Name', 'video_tags' ),
		'singular_name'              => _x( 'Video Tag', 'Taxonomy Singular Name', 'video_tags' ),
		'menu_name'                  => __( 'Video Tag', 'video_tags' ),
		'all_items'                  => __( 'All Video Tags', 'video_tags' ),
		'parent_item'                => __( 'Parent Video Tag', 'video_tags' ),
		'parent_item_colon'          => __( 'Parent Video Tag:', 'video_tags' ),
		'new_item_name'              => __( 'New Video Tag Name', 'video_tags' ),
		'add_new_item'               => __( 'Add New Video Tag', 'video_tags' ),
		'edit_item'                  => __( 'Edit Video Tag', 'video_tags' ),
		'update_item'                => __( 'Update Video Tag', 'video_tags' ),
		'view_item'                  => __( 'View Video Tag', 'video_tags' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'video_tags' ),
		'add_or_remove_items'        => __( 'Add or remove Video Tag', 'video_tags' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'video_tags' ),
		'popular_items'              => __( 'Popular Items', 'video_tags' ),
		'search_items'               => __( 'Search Items', 'video_tags' ),
		'not_found'                  => __( 'Not Found', 'video_tags' ),
		'items_list'                 => __( 'Items list', 'video_tags' ),
		'items_list_navigation'      => __( 'Items list navigation', 'video_tags' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'video_tag', array( 'videoes' ), $args );

}
add_action( 'init', 'video_tags', 0 );

// Register Custom Post Type
function videos_post() {

	$labels = array(
		'name'                => _x( 'Qeli Talks', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Talk', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Qeli Talks', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Talks', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Talk', 'text_domain' ),
		'add_new'             => __( 'Add New Talk', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'videoes', 'text_domain' ),
		'description'         => __( 'Video Posts', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'video_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'slug'                => 'videos',
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-format-video',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'videoes', $args );

}

// Hook into the 'init' action
add_action( 'init', 'videos_post', 0 );