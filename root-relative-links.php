<?php 

 // root relative URLs for everything
// inspired by http://www.456bereastreet.com/archive/201010/how_to_make_wordpress_urls_root_relative/
// thanks to Scott Walkinshaw (scottwalkinshaw.com)
function root_relative_url($input) {
	$output = preg_replace_callback(
		'!(https?://[^/|"]+)([^"]+)?!',
		create_function(
			'$matches',
			// if full URL is site_url, return a slash for relative root
			'if (isset($matches[0]) && $matches[0] === site_url()) { return "/";' .
			// if domain is equal to site_url, then make URL relative
			'} elseif (isset($matches[0]) && strpos($matches[0], site_url() ) !== false)' . '{ return $matches[2];' .
			'} elseif (isset($matches[0]) && strpos($matches[0], llama_local_server() ) !== false)' . '{ return $matches[2];' .
			'} elseif (isset($matches[0]) && strpos($matches[0], llama_live_server() ) !== false)' . '{ return $matches[2];' .
			// if domain is not equal to site_url, do not make external link relative
			'} else { return $matches[0]; };'
		),
		$input
	);
	return $output;
}

// now filter output and make root relative

// on save
add_action('content_save_pre', 'root_relative_url');

// on load/view
add_filter('the_content', 'make_href_absolute'); // convert root relative the_content into absolute URLs
add_action('pre_get_posts', 'root_relative_attachment_urls'); // if feed and has attachments
//add_filter('theme_root_uri', 'root_relative_url');
//add_filter('stylesheet_directory_uri', 'root_relative_url');
//add_filter('template_directory_uri', 'root_relative_url');
//add_filter('plugins_url', 'root_relative_url');
//add_filter('the_permalink', 'root_relative_url');
//add_filter('wp_list_pages', 'root_relative_url');
//add_filter('wp_list_categories', 'root_relative_url');
//add_filter('wp_nav_menu', 'root_relative_url');
//add_filter('the_content_more_link', 'root_relative_url');
//add_filter('the_tags', 'root_relative_url');
//add_filter('get_pagenum_link', 'root_relative_url');
//add_filter('get_comment_link', 'root_relative_url');
//add_filter('month_link', 'root_relative_url');
//add_filter('day_link', 'root_relative_url');
//add_filter('year_link', 'root_relative_url');
//add_filter('tag_link', 'root_relative_url');
//add_filter('the_author_posts_link', 'root_relative_url');

// base URL to add to front of URL
$base_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

function make_href_absolute($input) {
	// RegEx to find URLs
	$input = preg_replace_callback( '/((href|src)\s*=\s*[\"\'])([^\"\']+)/i', 'parseURL', $input);
  return $input;
}

function parseURL($input) {
	global $base_url;
	$url = $input[3];
	$url = convertRelativeToAbsoluteURL($url, $base_url);
	return $input[1] . $url;
}

function convertRelativeToAbsoluteURL($rel, $base) {
	/* return if already absolute URL */
	if (@parse_url($rel, PHP_URL_SCHEME) != '') return $rel;
	
	/* find queries and anchors, add base URL, and return */
	if ($rel[0]=='#' || $rel[0]=='?') return $base.$rel;
	
	$path = '';
	
	/* parse base URL and convert to local variables: $scheme, $host, $path */
	
	
	// this line appears to be a boolean sometimes, need to look into further
	extract(parse_url($base));
	
	/* remove non-directory element from path */
	$path = preg_replace('#/[^/]*$#', '', $path);
	
	/* destroy path if relative url points to root */
	if ($rel[0] == '/') $path = '';
	
	/* dirty absolute URL */
	$abs = "$host$path/$rel";
	
	/* replace beginning of relative URLs: '//' or '/./' or '/foo/../' with '/' */
	$re = array('#(/\.?/)#', '#/(?!\.\.)[^/]+/\.\./#');
	for($n=1; $n>0; $abs=preg_replace($re, '/', $abs, -1, $n)) {}
	
	/* absolute URL is ready! */
	return $scheme.'://'.$abs;
} 
  
// remove root relative URLs on any attachments in the feed
function root_relative_attachment_urls() {
	if (!is_feed()) {
		add_filter('wp_get_attachment_url', 'root_relative_url');
		add_filter('wp_get_attachment_link', 'root_relative_url');
	}
	else {
		// add feature -- MAKE POINT TO LIVE SERVER
	}
}

//for testing if local or live server
function llama_local_server() {
	global $servers;
	return $servers['local'];
}

function llama_live_server() {
	global $servers;
	return $servers['production'];
}


/* * * * * * * * * * * * * * * */



 ?>