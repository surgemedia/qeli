<?php 

// Register Custom Taxonomy
function courses_delivery_method() {

	$labels = array(
		'name'                       => _x( 'Delivery Methods', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Delivery Method', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Delivery Methods', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'delivery_method', array( 'post' ), $args );

}
add_action( 'init', 'courses_delivery_method', 0 );

// Register Custom Taxonomy
function courses_categories() {

	$labels = array(
		'name'                       => _x( 'Course Categories', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Categories', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
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
	register_taxonomy( 'courses_categories', array( 'post' ), $args );

// Hook into the 'init' action

}
add_action( 'init', 'courses_categories', 0 );

// Register Custom Taxonomy
function courses_tags() {

	$labels = array(
		'name'                       => _x( 'Course Tags', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Tag', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Tags', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'courses_tags', array( 'post' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'courses_tags', 0 );

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
		'taxonomies'          => array( 'courses_categories','courses_tags','delivery_method'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-book-alt',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'courses', $args );

}

// Hook into the 'init' action
add_action( 'init', 'courses', 0 );
