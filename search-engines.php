<?php 

function hide_from_bots() {
    echo '<meta name="robots" content="noindex,nofollow">';
}

// if not the production server, add meta tag and hide page from bots
if(isset($servers['staging']) && $_SERVER['SERVER_NAME'] == $servers['staging']
		|| isset($servers['local']) && $_SERVER['SERVER_NAME'] == $servers['local'] ) {
	add_action('wp_head', 'hide_from_bots');
}

?>