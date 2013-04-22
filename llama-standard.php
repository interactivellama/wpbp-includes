<?php  
// a collection of standard functions by Stephen M. James

function llama_add_rewrites($content) {
    global $wp_rewrite;
    $llama_new_non_wp_rules = array(
    	// icons for root folder
    	'favicon.ico' => 'assets/icons/favicon.ico',
    	'apple-touch(.*).png' => 'assets/icons/apple-touch$1.png',
	    'assets/icons/(.*)'      => THEME_PATH . '/assets/icons/$1',
      // wpbp-assets
      'assets/wpbp-assets/(.*)'      => THEME_PATH . '/assets/wpbp-assets/$1',
      // remove timedate stamp, present for versionng / cache busting
      '(.*)\.[\d]+\.(css|js)$'      => '$1.$2 [L]',
    );
    $wp_rewrite->non_wp_rules = array_merge($wp_rewrite->non_wp_rules, $llama_new_non_wp_rules);
    return $content;
}

//add rewrites to htaccess
if (!is_multisite() && !is_child_theme() && get_option('permalink_structure')) {
      add_action('generate_rewrite_rules', 'llama_add_rewrites');
}
//$wp_rewrite->flush_rules(); // for debugging mod_rewrite

//gets name of page with "page-" and ".php" removed
function llama_get_template_suffix($filename) {	
	// get current file name
	$template = explode('page-', basename($filename, '.php'));
	return $template[1];
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

// always activate these plugins if available

function run_activate_plugin( $plugin ) {
    $current = get_option( 'active_plugins' );
    $plugin = plugin_basename( trim( $plugin ) );

    if ( !in_array( $plugin, $current ) ) {
        $current[] = $plugin;
        sort( $current );
        do_action( 'activate_plugin', trim( $plugin ) );
        update_option( 'active_plugins', $current );
        do_action( 'activate_' . trim( $plugin ) );
        do_action( 'activated_plugin', trim( $plugin) );
    }

    return null;
}

//for debugging
function dumpvars() {
	global $wp_query;
	var_dump($wp_query->query_vars);
}


//** RELOCATE URLs
function llama_relocate($address = '') {

	global $servers;
	
	if($address) {
		update_option('siteurl', 'http://'.$address );
			update_option('home', 'http://'.$address );
	}
	else {
	//** Automatic RELOCATE URLs (see wp-config.php for servers)
	// if the current server isn't the live server
	if ($servers['current'] !== $servers['production'])	 {
		// cycle through servers and find the current one, update the database if a match is found
		foreach($servers as $key){
			if($servers['current'] == $key) {
				update_option('siteurl', 'http://'.$key );
				update_option('home', 'http://'.$key );
			}
		}
		// if current bloginfo isn't the live server then update database
	} elseif (get_bloginfo('siteurl') !== $servers['production']) {
		update_option('siteurl', $servers['production'] );
		update_option('home', $servers['production'] );
	}
	}
	
}

//llama_relocate();

//for testing if local or live server
function llama_local_server() {
	global $servers;
	return $servers['local'];
}

function llama_live_server() {
	global $servers;
	return $servers['production'];
}


// Test if site is currently live (used for file versioning, CSS preprocessors, etc.)
function llama_is_live() {
	global $servers, $TESTING_OVERRIDE;
		
	if ( ($_SERVER['HTTP_HOST'] == $servers['local']) && ($TESTING_OVERRIDE == false) )	 {
		return false;
	}
	else {
		return true;
	}

}

/* * * * * * * * * * * * * * * *
JAVASCRIPT AND CSS
* * * * * * * * * * * * * * * */

// Allows autoversioning of css and js files

/**
 *  Given a file, i.e. /css/base.css, replaces it with a string containing the
 *  file's mtime, i.e. /css/base.1221534296.css.
 *  
 *  @param $file  The file to be loaded.  Must be an absolute path (i.e.
 *                starting with slash).
 */

function llama_auto_version($file ='', $alt_file = '', $extention = '') {
	//echo get_template_directory().$file;
  // strpos($file, '/') !== 0 || REMOVED
    
  if(!file_exists(get_template_directory().$file) && $alt_file == '') {
  	return $file;
  }

	// alt file's time will be used if it is defined	    
  if($alt_file != '') {
	  $mtime = filemtime(get_template_directory().$alt_file);
  }
  else {	
		$mtime = filemtime(get_template_directory().$file);
  }
  
  //echo $mtime;
  return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1".$extention, $file);
}