<?php 

// if variable is empty returns string, otherwise returns true or false if current template matches
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
function llama_is_blog () {
	global  $post;
	$posttype = get_post_type($post );
	return ( ((is_archive()) || (is_author()) || (is_category()) || (is_home()) || (is_single()) || (is_tag())) && ( $posttype == 'post')  ) ? true : false ;
}


// call slug and get a post ID returned
function llama_get_ID_by_slug($page_slug) {
    $page = get_page_by_path($page_slug);
    if ($page) {
        return $page->ID;
    } else {
        return null;
    }
}

//gets name of page with "page-" and ".php" removed
function llama_get_template_suffix($filename) {	
	// get current file name
	$template = explode('template-', basename($filename, '.php'));
	return $template[1];
}


?>