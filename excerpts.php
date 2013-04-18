<?php 

// Various excerpt lengths passed as strings ("function name as callback") 
// Example: llama_excerpt('llama_excerpt_length_products_posts', 'llama_excerptmore');

function llama_excerpt_length_blog( $length ) {
	return 35;
}

function llama_excerpt_length_recent_posts( $length ) {
	return 100;
}

function llama_excerpt_length_products_posts( $length ) {
	return 20;
}

function llama_excerptmore( $more ) {
	return '...';
}


function llama_excerpt( $the_content = '', $link = '', $length_callback = '', $more_callback = '' ) {
	if ( function_exists( $length_callback ) )
		add_filter( 'excerpt_length', $length_callback );
	if ( function_exists( $more_callback ) )
		add_filter( 'excerpt_more', $more_callback );
	
	$the_excerpt = get_the_excerpt();
	$output = apply_filters( 'wptexturize', $the_excerpt );
	$output = apply_filters( 'convert_chars', $output );

	echo wpautop($output);

 	if ($the_excerpt !== $the_content && $link) {	
		echo '<div class="more"><a href="'.$link.'">Continue reading</a>.</div>';	
	}

}

 ?>