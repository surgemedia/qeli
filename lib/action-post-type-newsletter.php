<?php
// Register Custom Taxonomy
function archive_tax() {

	$labels = array(
		'name'                       => _x( 'Archives', 'Taxonomy General Name', 'archive_tax' ),
		'singular_name'              => _x( 'Archive', 'Taxonomy Singular Name', 'archive_tax' ),
		'menu_name'                  => __( 'Archive', 'archive_tax' ),
		'all_items'                  => __( 'All Items', 'archive_tax' ),
		'parent_item'                => __( 'Parent Item', 'archive_tax' ),
		'parent_item_colon'          => __( 'Parent Item:', 'archive_tax' ),
		'new_item_name'              => __( 'New Item Archive', 'archive_tax' ),
		'add_new_item'               => __( 'Add New Archive', 'archive_tax' ),
		'edit_item'                  => __( 'Edit Archive', 'archive_tax' ),
		'update_item'                => __( 'Update Archive', 'archive_tax' ),
		'view_item'                  => __( 'View Archive', 'archive_tax' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'archive_tax' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'archive_tax' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'archive_tax' ),
		'popular_items'              => __( 'Popular Items', 'archive_tax' ),
		'search_items'               => __( 'Search Items', 'archive_tax' ),
		'not_found'                  => __( 'Not Found', 'archive_tax' ),
		'items_list'                 => __( 'Items list', 'archive_tax' ),
		'items_list_navigation'      => __( 'Items list navigation', 'archive_tax' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'archive_tax', array( 'newsletter' ), $args );

}
add_action( 'init', 'archive_tax', 0 );


// Register Custom Post Type
function newsletter_posts() {

	$labels = array(
		'name'                => _x( 'Newsletters', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Newsletter', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'QELi Newsletter', 'text_domain' ),
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
		'label'               => __( 'newsletter', 'text_domain' ),
		'description'         => __( 'QELi Newsletter', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'author', ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'rewrite'            => array( 'slug' => 'newsletter' ),
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-admin-site',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'newsletter', $args );

}

// Hook into the 'init' action
add_action( 'init', 'newsletter_posts', 0 );


