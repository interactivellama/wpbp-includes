<?php
/**
 * Custom functions and wpbp-includes
 */

/* -------------------------------------------
UNIQUE TO THEME
------------------------------------------- */
// Add pages with lorem ipsum at theme initiation
// include_once('initial-pages.php');

// Custom actions for excerpts
include_once('excerpts.php');

// Boilerplate company fields
include_once('custom-fields-default.php');
// probably empty, but for 
include_once('custom-post-types.php');					


/* -------------------------------------------
NOT UNIQUE TO THEME
This may include legacy code since it might be used across multiple sites.
------------------------------------------- */
// add HTML5 Boilerplate htaccess
include_once('wpbp-includes/vendor/wp-h5bp-htaccess-master/wp-h5bp-htaccess.php');

// prevent error notice if advanced custom fields plugin is NOT installed
include_once('wpbp-includes/acf-wrapper.php');
// Add ACF support for catagories
// include_once('acf-categories.php');

// logo, login, etc.
include_once('wpbp-includes/admin.php');											

// get current template, is current page a blog page, etc.
include_once('wpbp-includes/templating.php');

// image helper functions like get image source from ID
include_once('wpbp-includes/images.php');											

// PHP debugging functions liek predump
include_once('wpbp-includes/debug.php');

// Remember to add a template for page redirect if you want to support this
include_once('page-redirect.php');

// These suggest plugins to add to a theme. A nice reminder.
include_once('plugin-activation-class.php');		
include_once('plugin-activation.php');					

// remove domain prefix from all content fields URLs when saved
include_once('root-relative-links.php');

// SEO functions, like search engine spider block on staging sites
include_once('search-engines.php');

// htaccess/url rewrite functions such as css auto-versioning, icon folder rewrites
include_once('htaccess.php');

