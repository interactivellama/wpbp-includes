<?php 

//For Fire PHP
//fb('Current Template (from meta): '.get_post_meta( get_the_ID(), '_wp_page_template', TRUE ) );
//fb('Current Template: '.basename(__FILE__)); // for debug 

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