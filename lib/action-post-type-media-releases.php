<?php 
// Register Custom Post Type
function media_release_post() {

	$labels = array(
		'name'                => _x( 'Media Releases', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Media Release', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Media Releases', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Items', 'text_domain' ),
		'view_item'           => __( 'View Item', 'text_domain' ),
		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Item', 'text_domain' ),
		'update_item'         => __( 'Update Item', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'media_releases', 'text_domain' ),
		'description'         => __( 'Sed tempor consectetur tellus quis egestas. Duis eu ornare ante. Donec aliquet sem vel mattis laoreet. Duis elementum ut mauris et laoreet. Sed commodo, nisi non commodo eleifend, mauris diam volutpat enim, viverra tristique ligula purus quis lorem.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'excerpt', ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-megaphone',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'media_releases', $args );

}

// Hook into the 'init' action
add_action( 'init', 'media_release_post', 0 );
removeOtherPosts('media_release_post');