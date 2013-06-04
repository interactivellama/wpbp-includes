<?php 

//add_action( 'init', 'register_cpt_remc' );

/* 

function register_cpt_remc() {

    $labels = array( 
        'name' => _x( 'REMCs', 'remc' ),
        'singular_name' => _x( 'REMC', 'remc' ),
        'add_new' => _x( 'Add New', 'remc' ),
        'add_new_item' => _x( 'Add New REMC', 'remc' ),
        'edit_item' => _x( 'Edit REMC', 'remc' ),
        'new_item' => _x( 'New REMC', 'remc' ),
        'view_item' => _x( 'View REMC', 'remc' ),
        'search_items' => _x( 'Search REMCs', 'remc' ),
        'not_found' => _x( 'No REMCs found', 'remc' ),
        'not_found_in_trash' => _x( 'No REMCs found in Trash', 'remc' ),
        'parent_item_colon' => _x( 'Parent REMC:', 'remc' ),
        'menu_name' => _x( 'REMCs', 'remc' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        
        'supports' => array( 'title', 'custom-fields' ),
        
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'has_archive' => false,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => false,
        'capability_type' => 'post'
    );

    register_post_type( 'remc', $args );
}
*/

/*
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy

function add_custom_taxonomies() {
	// Add new "Locations" taxonomy to Posts
	register_taxonomy('location', 'post', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Locations', 'taxonomy general name' ),
			'singular_name' => _x( 'Location', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Locations' ),
			'all_items' => __( 'All Locations' ),
			'parent_item' => __( 'Parent Location' ),
			'parent_item_colon' => __( 'Parent Location:' ),
			'edit_item' => __( 'Edit Location' ),
			'update_item' => __( 'Update Location' ),
			'add_new_item' => __( 'Add New Location' ),
			'new_item_name' => __( 'New Location Name' ),
			'menu_name' => __( 'Locations' ),
		),
		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'locations', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
	));
}
add_action( 'init', 'add_custom_taxonomies', 0 );

*/

?>