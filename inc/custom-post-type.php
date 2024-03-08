<?php

function custom_post_type() {
	$labels = array(
		'name'                  => _x( 'Drinks', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Drink', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Drinks', 'text_domain' ),
		'name_admin_bar'        => __( 'Drinks', 'text_domain' ),
		'archives'              => __( 'Drink Archives', 'text_domain' ),
		'attributes'            => __( 'Drink Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Drink:', 'text_domain' ),
		'all_items'             => __( 'All Drinks', 'text_domain' ),
		'add_new_item'          => __( 'Add New Drink', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Drink', 'text_domain' ),
		'edit_item'             => __( 'Edit Drink', 'text_domain' ),
		'update_item'           => __( 'Update Drink', 'text_domain' ),
		'view_item'             => __( 'View Drink', 'text_domain' ),
		'view_items'            => __( 'View Drinks', 'text_domain' ),
		'search_items'          => __( 'Search Drink', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into drink', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this drink', 'text_domain' ),
		'items_list'            => __( 'Drinks list', 'text_domain' ),
		'items_list_navigation'	=> __( 'Drinks list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter drinks list', 'text_domain' ),
	);

	$args = array(
		'label'                 => __( 'Drink', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
		'taxonomies'            => array(),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-beer',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => false,
	);

	register_post_type( 'drinks', $args );
}

add_action( 'init', 'custom_post_type', 0 );

function custom_taxonomy_type() {
	$labels = array(
		'name'                       => _x( 'Drink Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Drink Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Drink Type', 'text_domain' ),
		'all_items'                  => __( 'All Drink Types', 'text_domain' ),
		'parent_item'                => __( 'Parent Drink Type', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Drink Type:', 'text_domain' ),
		'new_item_name'              => __( 'New Drink Type Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Drink Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Drink Type', 'text_domain' ),
		'update_item'                => __( 'Update Drink Type', 'text_domain' ),
		'view_item'                  => __( 'View Drink Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate drink types with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove drink types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Drink Types', 'text_domain' ),
		'search_items'               => __( 'Search Drink Types', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No drink types', 'text_domain' ),
		'items_list'                 => __( 'Drink Types list', 'text_domain' ),
		'items_list_navigation'      => __( 'Drink Types list navigation', 'text_domain' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => false,
	);

	register_taxonomy( 'drink_type', array( 'drinks' ), $args );
}

add_action( 'init', 'custom_taxonomy_type', 0 );

// Create custom taxonomy Tags
function custom_taxonomy_tags() {
	$labels = array(
		'name'                       => _x( 'Drink Tags', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Drink Tag', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Drink Tag', 'text_domain' ),
		'all_items'                  => __( 'All Drink Tags', 'text_domain' ),
		'parent_item'                => __( 'Parent Drink Tag', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Drink Tag:', 'text_domain' ),
		'new_item_name'              => __( 'New Drink Tag Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Drink Tag', 'text_domain' ),
		'edit_item'                  => __( 'Edit Drink Tag', 'text_domain' ),
		'update_item'                => __( 'Update Drink Tag', 'text_domain' ),
		'view_item'                  => __( 'View Drink Tag', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate drink tags with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove drink tags', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Drink Tags', 'text_domain' ),
		'search_items'               => __( 'Search Drink Tags', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No drink tags', 'text_domain' ),
		'items_list'                 => __( 'Drink Tags list', 'text_domain' ),
		'items_list_navigation'      => __( 'Drink Tags list navigation', 'text_domain' ),
	);

	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'							 => true,
		'show_in_rest'               => false,
	);

	register_taxonomy( 'drink_tags', array( 'drinks' ), $args );
}

add_action( 'init', 'custom_taxonomy_tags', 0 );

function wporg_add_custom_post_types($query) {
	if ( is_home() && $query->is_main_query() ) {
		$query->set( 'post_type', array( 'drinks' ) );
	}
	return $query;
}
add_action('pre_get_posts', 'wporg_add_custom_post_types');