<?php 

// htaccess/url rewrite functions for assets

function llama_add_rewrites($content) {
    global $wp_rewrite;
    $llama_new_non_wp_rules = array(
	    'assets/icons/(.*)'      => THEME_PATH . '/assets/icons/$1',
    	'favicon.ico' => 'assets/icons/favicon.ico',
    	'apple-touch(.*).png' => 'assets/icons/apple-touch$1.png',

      '(.*)\.[\d]+\.(css|js)$'	=> '$1.$2 [L]',
      '(.*)\.[\d]+\.(js)$'      => '/$1.$2 [QSA,L]',
      '(.*)\.[\d]+\.(css)$'     => '$1.$2 [L]'
    );
    $wp_rewrite->non_wp_rules = array_merge($wp_rewrite->non_wp_rules, $llama_new_non_wp_rules);
    return $content;
}

//add the above rules to htaccess
if (!is_multisite() && !is_child_theme() && get_option('permalink_structure')) {
    if (current_theme_supports('rewrite-urls')) {
      add_action('generate_rewrite_rules', 'llama_add_rewrites');
    }
}
//$wp_rewrite->flush_rules(); // for debugging mod_rewrite

/* * * * * * * * * * * * * * * * * * * * * * *
 Cache busting autoversioning for CSS and JS
* * * * * * * * * * * * * * * * * * * * * * */

/**
 *  Given a file, i.e. /css/base.css, replaces it with a string containing the
 *  file's mtime, i.e. /css/base.1221534296.css.
 *  
 *  @param $file  The file to be loaded.  Must be an absolute path (i.e.
 *                starting with slash).
 */

function llama_auto_version($file ='', $alternative_file = '', $extention = '') {
	//echo get_template_directory().$file;
  // strpos($file, '/') !== 0 || REMOVED
    
  if(!file_exists(get_template_directory().$file) && $alternative_file == '') {
  	return $file;
  }

	// alt file's time will be used if it is defined	    
  if($alt_file != '') {
	  $mtime = filemtime(get_template_directory().$alternative_file);
  }
  else {	
		$mtime = filemtime(get_template_directory().$file);
  }
  
  //echo $mtime;
  return preg_replace('{\\.([^./]+)$}', ".$mtime.\$1".$extention, $file);
}

?>