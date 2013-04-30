<?php 
/* =======================
Include all
======================= */

// advanced custom fields
include_once('acf-wrapper.php');								// prevent fail if ACF is not installed
include_once('acf-categories.php');							// support for catagories

include_once('admin-login.php');								// logo, etc.

include_once('custom-fields.php');							// Boilerplate company fields
include_once('custom-post-types.php');					// probably empty, but for 

include_once('debug.php');											// PHP debugging functions
include_once('excerpts.php');										// custom actions for excerpts
include_once('initial-pages.php');							// Bulk page creator
include_once('page-redirect.php');							// add template for 

include_once('plugin-activation-class.php');		// used by following file
include_once('plugin-activation.php');					// This suggests plugins to add to a theme.

include_once('root-relative-links.php');				// remove domain front content fields
include_once('search-engines.php');							// SEO functions, like spider block staging sites
include_once('htaccess.php');										// htaccess/url rewrite functions for assets


/* =======================
Miscellaneous
======================= */

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
function dumpvars() {
	global $wp_query;
	var_dump($wp_query->query_vars);
}


?>