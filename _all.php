<?php 
/* =======================
Include all
======================= */

// advanced custom fields
include_once('acf-wrapper.php');								// prevent fail if ACF is not installed
//include_once('acf-categories.php');							// support for catagories

include_once('admin.php');											// logo, etc.

include_once('custom-fields.php');							// Boilerplate company fields
include_once('custom-post-types.php');					// probably empty, but for 

include_once('debug.php');											// PHP debugging functions
include_once('excerpts.php');										// custom actions for excerpts
include_once('page-redirect.php');							// add template for 
include_once('plugin-activation-class.php');		// used by following file
include_once('plugin-activation.php');					// This suggests plugins to add to a theme.

include_once('root-relative-links.php');				// remove domain front content fields
include_once('search-engines.php');							// SEO functions, like spider block staging sites
include_once('htaccess.php');										// htaccess/url rewrite functions for assets

/* =======================
Miscellaneous
======================= */

function llama_image ($image_id, $image_size = '') {	
	$image = wp_get_attachment_image_src($image_id, $image_size);
	$image_source = $image[0];
	return $image_source;
}

// As of WP 3.1.1 addition of classes for css styling to parents of custom post types doesn't exist.
// We want the correct classes added to the correct custom post type parent in the wp-nav-menu for css styling and highlighting, so we're modifying each individually...
// The id of each link is required for each one you want to modify
// Place this in your WordPress functions.php file

function remove_parent_classes($class)
{
  // check for current page classes, return false if they exist.
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'active' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{
     switch (get_post_type())
     {
     	case 'program':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-83', $classes))
     		{
     		$classes = array_filter($classes, "remove_parent_classes");
     		   //$classes[] = 'current_page_parent';
         }
     		break;

     	case 'artist':
     		// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
     		// add the current page class to a specific menu item (replace ###).
     		if (in_array('menu-item-83', $classes))
     		{
     		$classes = array_filter($classes, "remove_parent_classes");
     		   //$classes[] = 'current_page_parent';
         }
     		break;

      // add more cases if necessary and/or a default
     }
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');



// no variable returns string, otherwise returns boolean

function llama_page_template($file_name = '') {
	global $post;
	if($file_name == '') {	
		return basename( get_page_template(), '.php' );
	}
	if (basename( get_page_template(), '.php' ) == $file_name ) {
		return true;
	}
	else {	
		return false;	
	}
}


// test if page is a blog/feed/single/etc. page
function is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}


// call slug and get a post ID returned
function get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

//just for WordPress debugging
function dumpquery() {
	global $wp_query;
	echo '<pre>';
	echo '<h1>$wp_query</h1>';
	print_r($wp_query->query_vars);
	echo '</pre>';
}

//just for WordPress debugging
function predump($var, $varname = '') {
	echo '<pre>';
	echo '<h1>'.$varname.'</h1>';
	print_r($var);
	echo '</pre>';
}


//gets name of page with "page-" and ".php" removed
function llama_get_template_suffix($filename) {	
	// get current file name
	$template = explode('template-', basename($filename, '.php'));
	return $template[1];
}


?>