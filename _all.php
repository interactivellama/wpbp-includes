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

// gets image source based on id and size
function llama_image ($image_id, $image_size = '') {	
	$image = wp_get_attachment_image_src($image_id, $image_size);
	$image_source = $image[0];
	return $image_source;
}

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